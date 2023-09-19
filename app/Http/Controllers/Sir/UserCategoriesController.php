<?php

namespace App\Http\Controllers\Sir;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use DB;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Input;
use App\Models\Management\Users;
use App\Models\Management\Category;
use App\Models\Sir\UserCategories;

class UserCategoriesController extends Controller {

    protected $users;
    protected $categories;
    
    public function __construct() {
        $this->middleware('auth');
        
        $this->users = Users::where("status", "=", "1")->orderBy('name', 'asc')->get();
        $this->categories = Category::where("status", "=", "1")->orderBy('name', 'asc')->get();
    }

    public function index($group, $page, $order = "", $dir = "") {
        $errors = (array) session('errors');
        $success = (array) session('success');
        $infos = (array) session('infos');

        return view($group . '/' . $page, [
            'group' => ucwords($group),
            'page' => ucwords($page),
            'users' => $this->users,
            'categories' => $this->categories,
            'errors' => $errors,
            'success' => $success,
            'infos' => $infos
        ]);
    }

    public function viewlist($group, $page) {
//select(DB::raw("cubes.name as cube, querys2.name parent, querys.* "))
                
        $results = UserCategories::select(DB::raw("user_categories.id, users.name user, categories.name category"))
                ->join("users", "users.id", "=", "user_categories.user_id")
                ->join("categories", "categories.id", "=", "user_categories.category_id");

        $buttons = array();
        return Datatables::of($results)
                ->addColumn('action', function ($model) use ($group, $page, $buttons) {
                    return getListForm($model->id, $group, $page, $buttons, $model);
                })->escapeColumns(['action'])->make(true);
    }

    public function edit($group, $page, $id) {
        $ucEdit = UserCategories::where("id", "=", $id)->first();
                
        return view($group . '/' . $page, [
            'group' => ucwords($group),
            'page' => ucwords($page),
            'users' => $this->users,
            'categories' => $this->categories,
            'ucEdit' => $ucEdit
        ]);
    }

    public function save(Request $request, $group, $page) {

//        $validator = Validator::make($request->all(), [
//                    'name' => 'required|max:50'
//        ]);
//
//        if ($validator->fails()) {
//            return back()->withInput()->withErrors($validator);
//        }

        try {
            if(!empty($request->ucId)){
                $uc = UserCategories::where("id", "=", $request->ucId)->first();
            }
            else {
                $uc = new UserCategories();
            }
            
            $uc->user_id = $request->user_id;
            $uc->category_id = $request->category_id;
            
            $uc->save();
        } catch (\Exception $e) {
            return back()->with('errors', array(__("User Category can't be saved. Please review data and try again later")));
        }
//        return back()->with('success', array(__('Saved successfuly')));
        return redirect(strtolower('/' . $group . '/' . $page))->with('success', __('Saved successfuly'));
    }

    public function delete($group, $page, $id) {
        try {
            UserCategories::where("id", "=", $id)->delete();
        } catch (\Exception $e) {
            return back()->with('errors', array(__('Deleted unsuccessfuly foreing keys')));
        }
        return back()->with('success', array(__('Deleted successfuly')));
    }

    public function ajax(Request $request, $page, $group) {
        $type = Input::get("type");
        $result = new \stdClass();
        $result->success = false;
        switch ($type) {
            default:
                break;
        }
        return json_encode($result);
    }

}
