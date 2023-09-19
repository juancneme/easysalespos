<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Management\Catalog;
use App\Models\Management\Client;
use App\Models\Management\Contract;
use App\Models\Management\SpecialPrices;
use App\Models\Management\Users;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\Traits\AuthenticateClients;
use Illuminate\Http\Request;
use App\Models\Management\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

const ADMIN_CONTRACT = 1;

class LoginController extends Controller {
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
    use AuthenticateClients;

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
    public function __construct() {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function showLoginForm()
    {
        $parametros = Input::get("par");

        if(empty($parametros)){
            $parametros = 'TERJUGVXcjhmQWMvSlR1RWNCTUVqQT09';
        }

        $encdec = new \App\Http\Controllers\Security\EncdecController();
        $parametros = $encdec->encrypt_decrypt('decrypt', $parametros);

        $parms = explode("|", $parametros);

        $imagen_login = $this->getLoginImage($parms[0], $parms[1]);
        $this->validatePromotions($parms[0]);

        return view('auth.login',['contratin' => $parms[0], 'type_in' => $parms[1] , 'imagen_login' => $imagen_login]);
    }

    /**
     * Handle an authentication attempt.
     *
     * @return Response
     */
    public function authenticate() {
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            // Authentication passed...
            return redirect()->intended('dashboard');
        }
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */

    public function logout(Request $request)
    {

        if(!empty(auth()->user()->contract_id)){
            $id_contract = auth()->user()->contract_id;
        } else {
            $id_contract = ADMIN_CONTRACT;
        }
        $contract = Contract::find($id_contract);
        $key = $contract->keyfisico;

        if(!empty(auth()->guard('client')->user())){
            if(!empty($contract->keyvirtual)){
                $key = $contract->keyvirtual;
            }else{
                $contract =  Contract::find(auth()->guard('client')->user()->contract_id);
                $key = $contract->keyvirtual;
            }
        }

        $this->guard()->logout();
        $this->clientGuard()->logout();
        $request->session()->invalidate();

        return redirect('auth/login?par=' . $key);
    }

    public function getLoginImage($contract, $type){

        $path  = '/support/pictures/partners/'. str_pad($contract, 3, "0", STR_PAD_LEFT);
        $file = $type === 'f' ? '/logo000001.png' : '/logo000004.png';
        $filepath = $path.$file;

        $exists = file_exists(public_path($filepath));

        if(!$exists) {
            $filepath = '/support/pictures/partners/001'.$file;
        }

        $filepath = '/support/pictures/config/logos/Logo-EasySalesPOS-01.png';

        return $filepath;
    }

    protected function credentials(Request $request)
    {
        $contract = Users::where('email',$request->email)->value('contract_id');
        $credentials = $request->only($this->username(), 'password');
        if ($request->type_in == 'v') {
            $credentials['contract_id'] = $contract === ADMIN_CONTRACT ? ADMIN_CONTRACT : $request->num_contract;
        } 
        return $credentials;
    }

    public function validatePromotions($contract){

        $actualDate = Carbon::now();

        $catalogs = Catalog::where('contract_id', $contract)->get();
        $arrayCatalogs = [];

        foreach($catalogs as $catalog){
            array_push($arrayCatalogs, $catalog->id);
        }

        //Disabled
        SpecialPrices::where('startdate','>', $actualDate)
            ->whereIn('catalog_id', $arrayCatalogs)->update(['status'=>0]);

        //Enabled
        SpecialPrices::where('startdate','<', $actualDate)
            ->whereIn('catalog_id', $arrayCatalogs)->update(['status'=>1]);

        //Caducated
        SpecialPrices::where('enddate','<', $actualDate)
            ->whereIn('catalog_id', $arrayCatalogs)->update(['status'=>2]);
    }


      /**
     * Send the response after the user was authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function sendLoginResponse(Request $request)
    {
		$request->session()->regenerate();
		$previous_session = auth()->user()->session_id;
		if ($previous_session) {
			\Session::getHandler()->destroy($previous_session);
		}
		auth()->user()->session_id = \Session::getId();
		auth()->user()->save();
		$this->clearLoginAttempts($request);

		return $this->authenticated($request, $this->guard()->user())
				?: redirect()->intended($this->redirectPath());
    }

}

