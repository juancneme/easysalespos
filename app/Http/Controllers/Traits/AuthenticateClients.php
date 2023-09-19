<?php

namespace App\Http\Controllers\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

trait AuthenticateClients{

    public function showClientLoginForm()
    {
        return view('auth.login',['client' => true]);
    }

    public function clientLogin(Request $request)
    {
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptClientLogin($request)) {
            if(auth()->guard('client')->user()->status == 1){
                return $this->sendLoginClientResponse($request);
            }
            else {
                $this->clientGuard()->logout();

                $request->session()->invalidate();
                return $this->sendFailedLoginResponse($request);
            }
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }


    protected function attemptClientLogin(Request $request)
    {
        return $this->clientGuard()->attempt(
            $this->credentials($request), $request->has('remember')
        );
    }

    protected function sendLoginClientResponse(Request $request)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        return $this->authenticated($request, $this->clientGuard()->user())
            ?: redirect()->intended($this->redirectPath());
    }

    protected function clientGuard()
    {
        return Auth::guard('client');
    }

}


