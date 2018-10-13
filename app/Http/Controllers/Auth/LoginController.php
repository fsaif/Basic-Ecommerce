<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;

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

     * Handle Social login request

     *

     * @return response

     */

    public function socialLogin($social)

    {

        return Socialite::driver($social)->redirect();

    }

    /**

     * Obtain the user information from Social Logged in.

     * @param $social

     * @return Response

     */

    public function handleProviderCallback($social)

    {
        try {
            $userSocial = Socialite::driver($social)->user();

            $user = User::where(['email' => $userSocial->getEmail()])->first();

            if ($user) {

                Auth::login($user);

                return Redirect::route('home');

            } else {

                $user = new User();
                $user->username = $userSocial->getName();
                $user->email = $userSocial->getEmail();
                $user->password = Hash::make(str_random(8));
                $user->save();

                Auth::login($user);
                return Redirect::route('home');

            }
        } catch (\Exception $e) {
            return Redirect::route('signup');
        }


    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/shop/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->redirectTo = route('home');
    }
}
