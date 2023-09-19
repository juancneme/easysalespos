<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;

//Auth Facade
use Illuminate\Support\Facades\Auth;

//Password Broker Facade
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;

class ResetPasswordController extends Controller
{
    /*
      |--------------------------------------------------------------------------
      | Password Reset Controller
      |--------------------------------------------------------------------------
      |
      | This controller is responsible for handling password reset requests
      | and uses a simple trait to include this behavior. You're free to
      | explore this trait and override any methods you wish to tweak.
      |
     */

    use ResetsPasswords;

    public function validateIfExistOldPass(Request $request)
    {
        $traitsValidator = new ResetPasswordController();
        if ($request->old_password) {
            $this->validate($request, $this->rules2(), $traitsValidator->validationErrorMessages());
            $traitsValidator->reset($request);
            $this->redirectTo;
        } else {
            $traitsValidator->reset($request);
        }
        /**
         * Where to redirect users after resetting their password.
         *
         * @var string
         */
      return  redirect('/home');

    }

    protected function rules2()
    {
        $loginPassword = !empty(Auth::user()) ? Auth::user()->getAuthPassword() : 0;
        empty(Auth::user()) ? Input::merge(['old_password' => DB::table('users')->join('persons', 'persons.id', '=', 'users.person_id')->where('email', Input::get('email'))->value('numberdocument')]) : null;
        Validator::extend('old_password', function ($attribute, $value, $parameters, $validator) {
            return empty(Auth::user()) ? true : Hash::check($value, current($parameters));
        });

        return [
            'password' => 'required|confirmed|min:6|different:old_password',
            'old_password' => 'required_with:old_password|old_password:' . $loginPassword
        ];
    }

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/home';


    //Show form to seller where they can reset password
    public function showResetForm(Request $request, $token = null)
    {

        return view('management.passwords.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }

    //returns Password broker of seller
    public function broker()
    {

        return Password::broker('users');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     *
     *  public function __construct() {
     * $this->middleware('guest');
     *   }
     */

}