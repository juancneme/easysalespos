<?php 
namespace App\Http\Controllers;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class LogoutController extends Controller {

	use AuthenticatesAndRegistersUsers;
	
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function logout()
	{
		
		//return redirect('/home');
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('admin_template');
	}

}
