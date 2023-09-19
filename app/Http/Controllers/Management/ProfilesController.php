<?php

namespace App\Http\Controllers\Management;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Auth\EloquentUserProvider;
use DB;

use App\Models\Management\User;
use App\Models\Management\Role;
use App\Models\Management\Permission;
use App\Models\Management\Profiles;
use Yajra\Datatables\Datatables;
use Input;

class ProfilesController extends Controller {

    private $path = 'storage/app/profiles';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Edit an user
     *
     * @param unknown $group        	
     * @param unknown $page        	
     * @param unknown $id        	
     * @return \Illuminate\View\View
     */
    public function edit($group, $page, $id) {
        $profileEdit = Profiles::firstOrCreate(array('user_id' => $id));//Profiles::where('user_id', '=', $id)->first();
        return view($group . '/' . $page, [
            'group' => ucwords($group),
            'page' => ucwords($page),
            'profileEdit' => $profileEdit
                ]);
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
        $validator = Validator::make($request->all(), [
                    'user_id' => 'required',
                    'birthday' => 'required|date',
                    'photo' => 'image|max:5000',
                    'docType' => 'required',
                    'docNum' => 'required',
                    'celPhone' => 'required',
                    'address' => 'required'
                ]);

        // validate fields
        if ($validator->fails()) {
            return redirect($group . '/' . $page . '/edit/' . $request->user_id)->withInput()->withErrors($validator);
        }

        if(!empty($request->profileId)){
            $profile = Profiles::find($request->profileId);
        }
        else {
            $profile = new Profiles();
        }
        $profile->user_id = $request->user_id;
        $profile->birthday = $request->birthday;
        $profile->doc_type = $request->docType;
        $profile->doc_num = $request->docNum;
        $profile->cel_phone = $request->celPhone;
        $profile->house_phone = $request->housePhone;
        $profile->address = $request->address;
        $profile->neighborhood = $request->neighborhood;
        $profile->locality = $request->locality;
        $profile->house_apto = $request->houseApto;
        $profile->house_type = $request->houseType;
        $profile->childrens = $request->childrens;
        $profile->civil_status = $request->civilStatus;
        $profile->education = $request->education;        

        if (Input::hasFile('photo') && Input::file('photo')->isValid()) {
            $extension = Input::file('photo')->getClientOriginalExtension(); // getting image extension
            $name = str_replace('.' . $extension, '', Input::file('photo')->getClientOriginalName());
            $fileName = $name . '_' . rand(11111, 99999) . '.' . $extension; // renameing image
            Input::file('photo')->move('public/' . $this->path, $fileName);
            $profile->photo = $this->path . '/' . $fileName; //Input::file('photo')->getRealPath();;
        }
        
        if (Input::hasFile('cv') && Input::file('cv')->isValid()) {
            $extension = Input::file('cv')->getClientOriginalExtension(); // getting image extension
            $name = str_replace('.' . $extension, '', Input::file('cv')->getClientOriginalName());
            $fileName = $name . '_' . rand(11111, 99999) . '.' . $extension; // renameing image
            Input::file('cv')->move('public/' . $this->path, $fileName);
            $profile->cv = $this->path . '/' . $fileName; //Input::file('photo')->getRealPath();;
        }

        $profile->save();

        $roles = Role::orderBy('name', 'asc')->get();
// 		return view ( $group . '/users', [ 
// 				'group' => ucwords ( $group ),
// 				'page' => ucwords ( $page ),
// 				'roles' => $roles,
// 				"success" => array (
// 						"Saved successfuly" 
// 				)
// 		] );
        return redirect($group . '/users')->with('success', __('Saved successfuly'));
    }

}
