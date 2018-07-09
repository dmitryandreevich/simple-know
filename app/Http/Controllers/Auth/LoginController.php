<?php

namespace App\Http\Controllers\Auth;

use App\Classes\FbApiHelper;
use App\Classes\VkApiHelper;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index(){
        return view('auth.signIn');
    }

    public function loginByEmail(Request $request){

        $v = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string'
        ]);

        if($v->fails())
            return redirect()->back()->withErrors($v)->withInput();

        $user = User::where('email', $request->get('email'))->first();

        if($user == null)
            return redirect()->back()->with('error', 'Пользователя с данных email, не существует.')->withInput();

        if( Hash::check($request->get('password'), $user->password) ){
            Auth::login($user);

            return 'you are loggined!';
        }

        return redirect()->back()->with('error', 'Логин или пароль неверны.')->withInput();
    }

    public function loginByVk(Request $request){

        $vkApiHelper = new VkApiHelper();
        try{
            $at = $vkApiHelper->getAccessData( $request->input('code'),route('login.vk') );
            $user = User::where('vk_id', $at['user_id'])->first();

            if($user !== null){
                Auth::login($user);

                return redirect($this->redirectTo);
            }

            return redirect()->back()->with('error', 'Данный аккаунт не зарегистрирован!');
        }catch (\Exception $exception){
            return redirect()->back()->with('error', $exception->getMessage() );
        }
    }

    public function loginByFb(Request $request){
        $fbApiHelper = new FbApiHelper();
        try{
            $at = $fbApiHelper->getAccessData( $request->input('code'),route('login.fb') );
            $data = $fbApiHelper->getInfoUser($at['access_token']);
            $user = User::where('fb_id', $data['id'])->first();

            if($user !== null){
                Auth::login($user);

                return redirect($this->redirectTo);
            }

            return redirect()->back()->with('error', 'Данный аккаунт не зарегистрирован!');
        }catch (\Exception $exception){
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function logout(){
        Auth::logout();
        return redirect(route('login.index'));
    }
}
