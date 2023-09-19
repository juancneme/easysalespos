<?php namespace App\Http\Controllers\Management;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Auth\EloquentUserProvider;
use Yajra\Datatables\Datatables;
use App\Models\Management\Configurations;

class ConfigurationsController extends Controller {

/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware ( 'auth' );
	}
	
	/**
	 * Show de application index
	 *
	 * @param unknown $group        	
	 * @param unknown $page        	
	 * @param string $order        	
	 * @param string $dir        	
	 * @return \Illuminate\View\View
	 */
	public function index($group, $page, $order = "", $dir = "") {
		$errors = (array)session('errors');
		$success = (array)session('success');
		$infos = (array)session('infos');
		return view ( $group . '/' . $page, [ 
				'group' => ucwords ( $group ),
				'page' => ucwords ( $page ),
				'errors' => $errors,
				'success' => $success,
				'infos' => $infos
		] );
	}
	
	/**
	 * Return list of object eloquent model for datatables
	 *
	 * @param unknown $group
	 * @param unknown $page
	 * @return Ambigous <\Illuminate\View\View, mixed>
	 */
	public function viewlist($group, $page) {

		$queryColumns = array('id', 'name', 'key', 'value', 'forcompany');

		$results = Configurations::select($queryColumns); //->get();

		return Datatables::of($results)
				->addColumn('action', function ($model) use ($group, $page) {
					return getListForm($model->id, $group, $page);
				})->escapeColumns(['action'])->make();
	}
	
	/**
	 * Edit an configuration
	 *
	 * @param unknown $group        	
	 * @param unknown $page        	
	 * @param unknown $id        	
	 * @return \Illuminate\View\View
	 */
	public function edit($group, $page, $id) {		
		$configurationEdit = Configurations::find ( $id );
		return view ( $group . '/' . $page, [ 
				'group' => ucwords ( $group ),
				'page' => ucwords ( $page ),
				'configurationEdit' => $configurationEdit
		] );
	}
	
	/**
	 * Save changes create/update
	 *
	 * @param Request $request        	
	 * @param unknown $group        	
	 * @param unknown $page        	
	 */
	public function save(Request $request, $group, $page) {
		// get request fields
		$validator = Validator::make ( $request->all (), [ 
				'name' => 'required|max:45',
				'description' => 'required|max:255',
				'key' => 'required|max:45',
				'value' => 'required',
		] );
		
		// validate fields
		if ($validator->fails ()) {
			return redirect ( strtolower($group . '/' . $page) )->withInput ()->withErrors ( $validator );
		}
		
		if ($request->configId > 0) {
			$configuration = Configurations::find($request->configId );
		} else {
			$configuration = new Configurations ();
		}
		
		$configuration->name = $request->name;
		$configuration->description = $request->description;
		$configuration->key = $request->key;
		$configuration->value = $request->value;
                $configuration->forcompany = $request->forcompany;
			
		$configuration->save ();

// 		return view ( $group . '/' . $page, [ 
// 				'group' => ucwords ( $group ),
// 				'page' => ucwords ( $page ),
// 				"success" => array (
// 						"Saved successfuly" 
// 				)
// 		] );
		return redirect (strtolower('/'.$group.'/'.$page))->with('success', __('Saved successfuly'));
	}
	
	/**
	 * Delete an configuration
	 *
	 * @param unknown $group        	
	 * @param unknown $page        	
	 * @param unknown $id        	
	 */
	public function delete($group, $page, $id) {
		Configurations::findOrFail ( $id )->delete ();
		return view ( $group . '/' . $page, [ 
				'group' => ucwords ( $group ),
				'page' => ucwords ( $page ),
				"success" => array (
						__("Deleted successfuly")
				)
		] );
	}
}
	