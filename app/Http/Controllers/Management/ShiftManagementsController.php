<?php

namespace App\Http\Controllers\Management;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Yajra\Datatables\Datatables;
use App\Models\Management\Permission;
use App\Models\Management\ShiftManagements;
use App\Models\Management\Users;
use Carbon\Carbon;
use App\Models\Management\Lists;

const TIPOS_TURNOS = 11; 
const SHIFT_OPEN = 14;
const SHIFT_CLOSE = 15;

class ShiftManagementsController extends Controller
{
    
    public $permissions = '';

    public function __construct() {
        $this->middleware('auth');
        
        $this->users = Users::select('users.id', DB::raw("CONCAT(persons.firstname,' ',persons.othernames,' ',persons.lastname,' ',persons.otherlastname) as name"))
                ->join('persons', 'persons.id', '=', 'users.person_id')
                ->join('role_user', 'role_user.user_id', '=', 'users.id')
                ->where('users.contract_id', '=', auth()->user()->contract_id)
                ->where('role_user.role_id', '=', '3')->get();
        
        $this->itemstypeshift = Lists::where('idowner', '=', TIPOS_TURNOS)->whereRaw('id <> idowner')
                        ->orderBy('name', 'asc')->get();

        if (auth()->user()->hasRole('admin')) {
            $this->permissions = Permission::orderBy('name', 'asc')->get();
        }
    }

    public function index($group, $page, $order = "", $dir = "") {
        $errors = (array) session('errors');
        $success = (array) session('success');
        $infos = (array) session('infos');

        return view($group . '/' . $page, [
            'group' => ucwords($group),
            'page' => ucwords($page),
            'permissions' => $this->permissions,
            'users' => $this->users,
            'itemstypeshift' => $this->itemstypeshift,
            'errors' => $errors,
            'success' => $success,
            'infos' => $infos
        ]);
    }

    public function viewlist($group, $page) {

        $results = ShiftManagements::select('shift_managements.id as id', 'shift_managements.shiftdate',
                'shift_managements.typeshift_id', 'lists.name as typeshift_name', 'companies.name as company',
                'shift_managements.enddate as enddate','initialbalance','calculatedbalance',
                DB::raw("CONCAT(persons.firstname,' ',persons.othernames,' ',persons.lastname,' ',persons.otherlastname) as full_name"))
                ->join('users', 'users.id', '=', 'shift_managements.user_id')
                ->join('persons', 'persons.id', '=', 'users.person_id')
                ->join('lists', 'lists.id', '=', 'shift_managements.typeshift_id')
                ->join('companies_users', 'companies_users.user_id', '=', 'users.id')
                ->join('companies', 'companies.id', '=', 'companies_users.company_id')
                ->where('companies.contract_id', '=', auth()->user()->contract_id)
                ->get();

        return Datatables::of($results)
                        ->addColumn('action', function ($model) use ($group, $page) {
                            if($model->typeshift_id == SHIFT_CLOSE)
                                return getListForm($model->id, $group, $page,array(),null,false,false);
                            else
                                return getListForm($model->id, $group, $page,array(),null,true,false);
                        })->escapeColumns(['action'])->make(true);
    }

    public function edit($group, $page, $id) {
        $ShiftEdit = ShiftManagements::find($id);
        
        return view($group . '/' . $page, [
            'group' => ucwords($group),
            'page' => ucwords($page),
            'users' => $this->users,
            'itemstypeshift' => $this->itemstypeshift,
            'ShiftEdit' => $ShiftEdit
        ]);
    }

    public function save(Request $request, $group, $page) {
        
        if ($request->id > 0){
            
            try{
            
                DB::beginTransaction();

                $turno = ShiftManagements::find($request->id);
                $turno->typeshift_id=$request->sltypeshift;
                $turno->save();

                DB::commit();

                return redirect(strtolower('/'.$group.'/'.$page))->with('success', __('Saved successfuly'));
                 
            }catch(\Exception $e)
            {
                DB::rollback();
                return redirect(strtolower('/'.$group.'/'.$page))->with('errors', __('Error at update progress'));
            }
            
        }else{
            
            $ShiftId = ShiftManagements::select('id')
                ->where('user_id', '=', $request->idusuario)
                ->where('typeshift_id', '=', '14')->get();
            
            if (count($ShiftId) == 0){
            
                try{

                    DB::beginTransaction();

                    $turno = new ShiftManagements;
                    $mytime=Carbon::now('America/Bogota');
                    $turno->shiftdate=$mytime->toDateTimeString();;
                    $turno->user_id=$request->idusuario;
                    $turno->typeshift_id=$request->sltypeshift;
                    $turno->save();

                    DB::commit();
                    
                    return redirect(strtolower('/'.$group.'/'.$page))->with('success', __('Saved successfuly'));

                }catch(\Exception $e)
                {
                    DB::rollback();
                    return redirect(strtolower('/'.$group.'/'.$page))->with('errors', __('Error at update progress'));
                }
            
            }else{

                return redirect(strtolower('/'.$group.'/'.$page))->with('infos', __('Solo se permite un turno abierto por usuario'));

            }
            
        }

    }

    public function delete($group, $page, $id) {
                
         try{

           $time = Carbon::now();
           DB::beginTransaction();

           $turno = ShiftManagements::find($id);
           $turno->enddate = $time;
           $turno->typeshift_id=SHIFT_CLOSE;
           $turno->save();
           
           DB::commit();
           
           return redirect(strtolower('/'.$group.'/'.$page))->with('success', __('Closed Shift'));
                 
        }catch(\Exception $e)
        {
            DB::rollback();
            return redirect(strtolower('/'.$group.'/'.$page))->with('errors', __('Error at update progress'));
        }
        
    }
    
}
