<?php

namespace App\Models\Management;

use App\Enums\UserRoleEnum;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use App\Models\Management\Positions;
use App\Models\Evaluarte\UsersCalibrationSkills;



use App\Notifications\ResetPasswordNotification;
use DB;

class User extends Model implements AuthenticatableContract, AuthorizableContract, CanResetPasswordContract {

    use Authenticatable,
        CanResetPassword; // Authorizable
    use EntrustUserTrait; // add this trait to your user model
    use Notifiable;

    //Mass assignable attributes
    protected $fillable = [
        'name', 'email', 'password',
    ];

    //hidden attributes
    protected $hidden = [
        'password', 'remember_token',
    ];

    //Send password reset notification
    public function sendPasswordResetNotification($token)
    {
     
        $this->notify(new ResetPasswordNotification($token));
    }

    protected $dates = ['created_at', 'updated_at'];

    public function getCreatedAtAttribute($value) {
        $date = strtotime($value);
        $value = date('Y-m-d', $date);
        if ($date === false) {
            return '-';
        }
        return $value;
    }
    
    public function Persona(){
        return $this->hasOne('App\Models\Management\Person', 'id', 'person_id');
    }

    public function Contrato(){
        return $this->hasOne('App\Models\Management\Contract', 'id', 'contract_id');
    }

    public function roles() {
        return $this->belongsToMany('App\Models\Management\Role');
//        return Role::join('role_user', 'role_user.role_id', '=', 'roles.id')
//            ->where('role_user.user_id', '=', $this->id)->get();
    }

    public function getRoles() {
        return Role::join('role_user', 'role_user.role_id', '=', 'roles.id')
                        ->where('role_user.user_id', '=', $this->id)->get();
    }

    public static function searchFullText($q, $pages) {
        return User::select(DB::raw("users.id, users.name, concat_ws(' ', users.email) description"))
                        ->whereRaw("MATCH(users.name, users.email) AGAINST('+" . $q . "*' in boolean mode)")
                        ->where("users.company_id", "=", auth()->user()->company_id)
                        ->get();
    }

    // public function scopeSellers($query, $contract){
    //     return $query->select('users.id', 'socialreason', 'firstname', 'lastname')
    //         ->join('role_user', 'role_user.user_id', '=', 'users.id')
    //         ->join('persons', 'persons.id', '=', 'users.person_id')
    //         ->where('users.contract_id', '=', $contract)
    //         ->whereIn('role_user.role_id', [UserRoleEnum::CASHIER, UserRoleEnum::SELLER]);
    // }

    public function scopeSellers($query, $company){
        return $query->select('users.id', 'socialreason', 'firstname', 'lastname')
            ->join('companies_users', 'companies_users.user_id', 'users.id')
            ->join('persons', 'persons.id', 'users.person_id')
            ->where('companies_users.company_id', $company);
    }

}
