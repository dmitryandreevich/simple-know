<?php

namespace App\Http\Controllers\Auth;

use App\Classes\FbApiHelper;
use App\Classes\VkApiHelper;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function index(){
        return view('auth.signUpEmail');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function main(){
        return view('auth.signUp');
    }

    /**
     * RegisterController constructor.
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function registerByEmail(Request $request){

        $v = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'second_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
        ]);

        if($v->fails())
            return redirect()->back()->withErrors($v)->withInput();

        $randomPassword = str_random(9);

        $user = User::create([
            'name' => $request->get('name'),
            'second_name' => $request->get('second_name'),
            'email' => $request->get('email'),
            'password' => bcrypt($randomPassword)
        ]);

        mail($request->get('email'), 'Регистрация прошла успешно!', "Ваш пароль от аккаунта : $randomPassword\nВы всегда его можете сменить в настройках.");

        // auto login
        return redirect()->back()->with('success', 'Пользователь был успешно создан!');
    }

    /**
     * Registration by user in VK
     *
     * @param Request $request
     */
    public function registerByVk(Request $request)
    {
        try{
            $vkApiHelper = new VkApiHelper();
            $at = $vkApiHelper->getAccessData($request->input('code'), route('register.vk'));
        }catch (\Exception $exception){
            return redirect('/')->with('error', 'Произошла ошибка при получении данных VK API!');
        }
        // get data by vk
        $data = $vkApiHelper->getInfoUser($at['access_token'])['response'][0];
        try {
            $user = User::create([
                'email' => isset($at['email']) ? $at['email'] : "",
                'vk_id' => $at['user_id'],
                'name' => $data->first_name,
                'second_name' => $data->last_name
            ]);

            Auth::login($user);

            try{
                $fileContent = file_get_contents($data->photo_200_orig);

                Storage::put("public/avatars/$user->id.jpg", $fileContent);

                $user->avatar = "avatars/$user->id.jpg";
                $user->save();

                return redirect('/')->with('success', ' Вы успешно зарегистрировались!');
            }catch (\Exception $e){

            }

        } catch (QueryException $exception) {
            return redirect('/')->with('error', 'Произошла ошибка. Данный Email или VK уже привязаны!');
        }
    }

    public function registerByFb(Request $request){
        try{
            $fbApiHelper = new FbApiHelper();
            $at = $fbApiHelper->getAccessData( $request->input('code'), route('register.fb') );

            $data = $fbApiHelper->getInfoUser($at['access_token']);

        }catch (\Exception $exception){
            return redirect('/')->with('error', 'Произошла ошибка при получении данных Facebook API!');
        }

        try{
            $name = explode(' ', $data['name']);
            $user = User::create([
                'email' => isset($data['email']) ? $data['email'] : '',
                'fb_id' => $data['id'],
                'name' => $name[0],
                'second_name' => $name[1]
            ]);

            Auth::login($user);

            return redirect('/')->with('success', ' Вы успешно зарегистрировались.');
        }catch (QueryException $exception){
            return redirect('/')->with('error', 'Произошла ошибка. Данный Email или Facebook уже привязаны!');
        }

    }

}
