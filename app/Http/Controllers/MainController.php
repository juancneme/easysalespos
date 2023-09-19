<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
//use \Illuminate\Foundation\Application;
use Zizaco\Entrust\Entrust;
use Carbon\Carbon;

use App\Models\Management\RoleModule;

class MainController extends Controller {

    protected $entrust;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {

        $this->middleware('auth');

// 		$this->entrust = new Entrust(app());
    }

    /**
     * Show the application defined by group and page parameters, use an ordering by order and dir parameters.
     *
     * @param unknown $group
     * @param unknown $page
     * @param string $order
     * @param string $dir
     * @return Ambigous <\Illuminate\View\View, mixed>
     */
    public function index($group, $page) {

		// if(!auth()->check() || !$this->entrust->hasRole('admin')){
		// 	return view('/auth/login');
		// }

        $datework = Carbon::parse(auth()->user()->changed_password);
        $now = Carbon::now();
        $testdate = $datework->diffInDays($now);
        $found_key = in_array(auth()->user()->id, [100000], true);
        if ((auth()->user()->changed_password == null || $testdate >= 90) && !$found_key) {
            return redirect('/management/password');
        }

        $return = redirect()->action('HomeController@index');
        $pagefind = $page;

        if ($page == 'listsitems') $pagefind = 'lists';
        if ($page == 'catalogsproducts') $pagefind = 'catalogs';
        if ($page == 'catalogsproductsadd') $pagefind = 'catalogs';
        if ($page == 'catalogsadd') $pagefind = 'catalogs';
        if ($page == 'formulationordersproducts') $pagefind = 'formulationorders';
        if ($page == 'orderssuppliersproducts') $pagefind = 'orderssuppliers';
        if ($page == 'combinationproducts') $pagefind = 'combination';
        if ($page == 'deliveryproducts') $pagefind = 'deliveries';
        if ($page == 'inventorycatalogsproducts') $pagefind = 'inventory';
        if ($page == 'maintenancecatalogsproducts') $pagefind = 'maintenance';
        if ($page == 'salesitems') $pagefind = 'sales';
        if ($page == 'shoppingitems') $pagefind = 'shopping';
        if ($page == 'catalogsaddproducts') $pagefind = 'catalogs';
        if ($page == 'sistecreditpay') $pagefind = 'cashinputoutput';
        
        // if ($page == 'sellers') $pagefind = 'lists';
        // if ($page == 'cashinputoutput') $pagefind = 'pdvi';
        // if ($page == 'shiftclosure') $pagefind = 'lists';

        // $tienemod = RoleModule::join('modules', 'modules.id', 'role_module.module_id')
        //         ->join('role_user', 'role_user.role_id', 'role_module.role_id')
        //         ->where('modules.page_name', explode('?',$pagefind)[0])
        //         ->where('role_user.user_id', auth()->user()->id)
        //         ->get()->count();

        $tienemod = RoleModule::join('modules', 'modules.id', 'role_module.module_id')
                ->where('role_module.role_id', auth()->user()->roles[0]->id)
                ->where('modules.page_name', '=', $pagefind)
                ->get()->count();

        if ( $tienemod == 0) {
            return $return;
        }

        chdir('../');
        $className = 'App\\Http\\Controllers\\' . ucfirst($group) . '\\' . ucfirst($page) . 'Controller';
        if (file_exists(getcwd() . '/' . lcfirst(str_replace('\\', '/', $className)) . '.php')) {
            $controller = new \ReflectionClass($className);

            if ($controller->hasMethod("index")) {

                $return = $controller->getMethod("index")->invokeArgs(new $className(), array($group, $page));
            }
        } else {
            abort('404', 'The page you request not found!');
        }

        return $return;
    }

    public function autocomplete($group, $page) {
// 		if(!auth()->check() || !$this->entrust->hasRole('admin')){
// 			return view('/auth/login');
// 		}
        $return = redirect()->action('HomeController@index');
//        if(!validatePermission('access', $page)){
//            return $return;
//        }

        chdir('../');
        $className = 'App\\Http\\Controllers\\' . ucfirst($group) . '\\' . ucfirst($page) . 'Controller';
        if (file_exists(getcwd() . '/' . lcfirst(str_replace('\\', '/', $className)) . '.php')) {
            $controller = new \ReflectionClass($className);
            if ($controller->hasMethod("autocomplete")) {
                $return = $controller->getMethod("autocomplete")->invokeArgs(new $className(), array($group, $page));
            }
        } else {
            abort('404', 'The page you request not found!');
        }

        return $return;
    }

    /**
     * Return list of object eloquent model for datatables
     *
     * @param unknown $group
     * @param unknown $page
     * @return Ambigous <\Illuminate\View\View, mixed>
     */
    public function viewlist($group, $page) {
// 		if(!auth()->check() || !$this->entrust->hasRole('admin')){
// 			return view('/auth/login');
// 		}
        $return = redirect()->action('HomeController@index');
//        if(!validatePermission('access', $page)){
//            return $return;
//        }

        chdir('../');
        $className = 'App\\Http\\Controllers\\' . ucfirst($group) . '\\' . ucfirst($page) . 'Controller';
        if (file_exists(getcwd() . '/' . lcfirst(str_replace('\\', '/', $className)) . '.php')) {
            $controller = new \ReflectionClass($className);
            if ($controller->hasMethod("viewlist")) {
                $return = $controller->getMethod("viewlist")->invokeArgs(new $className(), array($group, $page));
            }
        } else {
            abort('404', 'The page you request not found!');
        }

        return $return;
    }

    /**
     * Process ajax request
     */
    public function ajax(Request $request, $group, $page) {
        $return = redirect()->action('HomeController@index');
//        if(!validatePermission('access', $page)){
//            return $return;
//        }

        chdir('../');
        $className = 'App\\Http\\Controllers\\' . ucfirst($group) . '\\' . ucfirst($page) . 'Controller';
        if (file_exists(getcwd() . '/' . lcfirst(str_replace('\\', '/', $className)) . '.php')) {
            $controller = new \ReflectionClass($className);
            if ($controller->hasMethod("ajax")) {
//				$return = $controller->getMethod("ajax")->invoke(new $className(),
//						array($request, $group, $page));
                $return = $controller->getMethod("ajax")->invokeArgs(new $className(), array($request, $group, $page));
            }
        } else {
            abort('404', 'The page you request not found!');
        }

        return $return;
    }

    /**
     * Process search filters
     *
     * @param Request $request
     * @param unknown $group
     * @param unknown $page
     * @return Ambigous <\Illuminate\View\View, mixed>
     */
    public function view(Request $request, $group, $page) {
// 		if(!Auth::check() || !$this->entrust->hasRole('admin')){
// 			return view('/auth/login');
// 		}
        $return = redirect()->action('HomeController@index');
//        if(!validatePermission('access', $page)){
//            return $return;
//        }

        chdir('../');
        $className = 'App\\Http\\Controllers\\' . ucfirst($group) . '\\' . ucfirst($page) . 'Controller';
        if (file_exists(getcwd() . '/' . lcfirst(str_replace('\\', '/', $className)) . '.php')) {
            $controller = new \ReflectionClass($className);
            if ($controller->hasMethod("view")) {
                $return = $controller->getMethod("view")->invokeArgs(new $className(), array($request, $group, $page));
            }
        } else {
            abort('404', 'The page you request not found!');
        }
        return $return;
    }

    public function execService($group, $page, $task, $params){
        $return = redirect()->action('HomeController@index');
        //        if(!validatePermission('access', $page) && !validatePermission('view', $page)){
        //            return $return;
        //        }

        chdir('../');
        $className = 'App\\Http\\Controllers\\' . ucfirst($group) . '\\' . ucfirst($page) . 'Controller';
        if (file_exists(getcwd() . '/' . lcfirst(str_replace('\\', '/', $className)) . '.php')) {
            $controller = new \ReflectionClass($className);
            if ($controller->hasMethod($task)) {
                $parametros = array();
                if(strtoupper(request()->getMethod()) == 'GET'){
                    $parametros[] = $group;
                    $parametros[] = $page;
                }
                else {
                    $parametros[] = request();
                    $parametros[] = $group;
                    $parametros[] = $page;
                }
                $parametros = array_merge($parametros, $params);
                $parametros[] = true;
                $return = $controller->getMethod($task)->invokeArgs(new $className(), $parametros);
            }
        } else {
            abort('404', 'The page you request not found!');
        }

        return $return;
    }
    /**
     * Edit an object
     *
     * @param unknown $group
     * @param unknown $page
     * @param unknown $id
     * @return Ambigous <\Illuminate\View\View, mixed>
     */
    public function edit($group, $page, $id) {
// 		if(!Auth::check() || !$this->entrust->hasRole('admin')){
// 			return view('/auth/login');
// 		}
        $return = redirect()->action('HomeController@index');
//        if(!validatePermission('access', $page) && !validatePermission('view', $page)){
//            return $return;
//        }

        chdir('../');
        $className = 'App\\Http\\Controllers\\' . ucfirst($group) . '\\' . ucfirst($page) . 'Controller';
        if (file_exists(getcwd() . '/' . lcfirst(str_replace('\\', '/', $className)) . '.php')) {
            $controller = new \ReflectionClass($className);
            if ($controller->hasMethod("edit")) {
                $return = $controller->getMethod("edit")->invokeArgs(new $className(), array($group, $page, $id));
            }
        } else {
            abort('404', 'The page you request not found!');
        }

        return $return;
    }

    /**
     * Save changes create/update
     *
     * @param Request $request
     * @param unknown $group
     * @param unknown $page
     * @return Ambigous <\Illuminate\View\View, mixed>
     */
    public function save(Request $request, $group, $page) {
// 		if(!Auth::check() || !$this->entrust->hasRole('admin')){
// 			return view('/auth/login');
// 		}
        $return = redirect()->action('HomeController@index');
//        if(!validatePermission('access', $page) && !validatePermission('save', $page)){
//            return $return;
//        }

        chdir('../');
        $className = 'App\\Http\\Controllers\\' . ucfirst($group) . '\\' . ucfirst($page) . 'Controller';
        if (file_exists(getcwd() . '/' . lcfirst(str_replace('\\', '/', $className)) . '.php')) {
            $controller = new \ReflectionClass($className);
            if ($controller->hasMethod("save")) {
                $return = $controller->getMethod("save")->invokeArgs(new $className(), array($request, $group, $page));
            }
        } else {
            abort('404', 'The page you request not found!');
        }

        return $return;
    }

    /**
     * activate/inactivate record
     *
     * @param Request $request
     * @param unknown $group
     * @param unknown $page
     * @return Ambigous <\Illuminate\View\View, mixed>
     */
    public function activate(Request $request, $group, $page) {
// 		if(!Auth::check() || !$this->entrust->hasRole('admin')){
// 			return view('/auth/login');
// 		}
        $return = redirect()->action('HomeController@index');
//        if(!validatePermission('access', $page)){
//            return $return;
//        }

        chdir('../');
        $className = 'App\\Http\\Controllers\\' . ucfirst($group) . '\\' . ucfirst($page) . 'Controller';
        if (file_exists(getcwd() . '/' . lcfirst(str_replace('\\', '/', $className)) . '.php')) {
            $controller = new \ReflectionClass($className);
            if ($controller->hasMethod("activate")) {
                $return = $controller->getMethod("activate")->invokeArgs(new $className(), array($request, $group, $page));
            }
        } else {
            abort('404', 'The page you request not found!');
        }

        return $return;
    }

    /**
     * Delete an object
     *
     * @param unknown $group
     * @param unknown $page
     * @param unknown $id
     * @return Ambigous <\Illuminate\View\View, mixed>
     */
    public function delete($group, $page, $id) {
// 		if(!Auth::check() || !$this->entrust->hasRole('admin')){
// 			return view('/auth/login');
// 		}
        $return = redirect()->action('HomeController@index');
//        if(!validatePermission('access', $page) && !validatePermission('delete', $page)){
//            return $return;
//        }

        chdir('../');
        $className = 'App\\Http\\Controllers\\' . ucfirst($group) . '\\' . ucfirst($page) . 'Controller';
        if (file_exists(getcwd() . '/' . lcfirst(str_replace('\\', '/', $className)) . '.php')) {
            $controller = new \ReflectionClass($className);
            if ($controller->hasMethod("delete")) {
                $return = $controller->getMethod("delete")->invokeArgs(new $className(), array($group, $page, $id));
            }
        } else {
            abort('404', 'The page you request not found!');
        }

        return $return;
    }

    /**
     * Download file
     *
     * @param unknown $group
     * @param unknown $page
     * @param unknown $id
     * @return Ambigous <\Illuminate\View\View, mixed>
     */
    public function download(Request $request, $group, $page) {
// 		if(!Auth::check() || !$this->entrust->hasRole('admin')){
// 			return view('/auth/login');
// 		}
        $return = redirect()->action('HomeController@index');
//        if(!validatePermission('access', $page)){
//            return $return;
//        }

        chdir('../');
        $className = 'App\\Http\\Controllers\\' . ucfirst($group) . '\\' . ucfirst($page) . 'Controller';
        if (file_exists(getcwd() . '/' . lcfirst(str_replace('\\', '/', $className)) . '.php')) {
            $controller = new \ReflectionClass($className);
            if ($controller->hasMethod("download")) {
                $return = $controller->getMethod("download")->invokeArgs(new $className(), array($request, $group, $page));
            }
        } else {
            abort('404', 'The page you request not found!');
        }

        return $return;
    }

    public function service(Request $request, $group, $page) {
        $return = redirect()->action('HomeController@index');
        chdir('../');
        $className = 'App\\Http\\Controllers\\' . ucfirst($group) . '\\' . ucfirst($page) . 'Controller';
        if (file_exists(getcwd() . '/' . lcfirst(str_replace('\\', '/', $className)) . '.php')) {
            $controller = new \ReflectionClass($className);
            if ($controller->hasMethod("route")) {
                $return = $controller->getMethod("route")->invokeArgs(new $className(), array($request, $group, $page));
            }
        } else {
            abort('404', 'The page you request not found!');
        }

        return $return;
    }


}
