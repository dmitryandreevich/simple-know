<?php

namespace App\Http\Controllers\Auth;

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
}
