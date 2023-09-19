<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use App\Models\Coffee\Students;
use App\Models\Coffee\Transactions;
use App\Models\Coffee\Enrolments;
use App\Models\Management\Module;

class SidebarController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $results = array();

        // q is a key to search
        $q = Input::get('q');

        // define the namespace
        $namespace = 'App\\Models';
        // get dir for namespace
        chdir('../');
        $dir = getcwd() . '/' . str_replace('\\', '/', lcfirst($namespace));

        // scan dir for know how many modules are
        $files = array_diff(scandir($dir), array('.', '..'));
        $models = array();
        foreach ($files as $dirs) {
            // find models folder of
            foreach (array_diff(scandir($dir . '/' . $dirs), array('.', '..')) as $model) {
                // format model name
                $temp = ucwords(str_replace('_', ' ', from_camel_case(str_replace('.php', '', $model))));
                // create a model in models array
                $models[$temp] = array();
                $models[$temp]['php'] = $namespace . '\\' . $dirs . '\\' . $model;
                $models[$temp]['class'] = $namespace . '\\' . $dirs . '\\' . str_replace('.php', '', $model);
                $models[$temp]['view'] = strtolower(lcfirst($dirs) . '/' . str_replace('.php', '', $model));
            }
        }

        // for each model, verify if contains searchFullText method and execute it
        foreach ($models as $group => $model) {
            // instantiate each model by reflection
            if (file_exists(getcwd() . '/' . lcfirst(str_replace('\\', '/', $model['php'])))) {
                $class = new \ReflectionClass($model['class']);
                if(validatePermission('search', explode('/',$model['view'])[1])){
                    if ($class->hasMethod('searchFullText')) {
                        // execute searchFullText method, passed by $q and pagination parameter
                        $list = $class->getMethod("searchFullText")->invokeArgs(new $model['class'](), array($q, getConfig('pagination')));
                        if (!empty($list)) {
                            $results[$group] = array();
                            $results[$group]['view'] = $model['view'];
                            $results[$group]['results'] = $list;
                        }
                    }
                }
            }
        }

        return view('search', [
            "group" => 'Search',
            "page" => "",
            "results" => $results
        ]);
    }

    public function ajax(){
        $type = Input::get("type");

        if($type == 'menu'){
            $menu = Module::select(DB::raw('modules.*, lists.name as icon'))
                ->leftJoin('modules as m2', function ($join) {
                    $join->on('m2.id', '=', 'modules.idowner')
                        ->on('m2.status', '=', DB::raw('1'));
                })
                //Faltros para seleccioanr los modulos del role asociado
                ->join('role_module', 'role_module.module_id', 'modules.id')
                ->join('role_user', 'role_user.role_id', 'role_module.role_id')
                ->leftjoin('lists', 'lists.id', 'modules.icon_id')
                ->where('role_user.user_id', '=', auth()->user()->id)
                ->where('modules.status', '=', 1)
                ->orderby('modules.idowner', 'asc') //Muestra las cabeceras del menu al inicio del Array para pintarlas primero.
                ->orderby('modules.order', 'asc')
                ->get();

            return json_encode($menu);
        }
        else if($type == 'lang'){
            $lang = Input::get("lang");
            Session::put('locale', $lang);
        }
    }
}
