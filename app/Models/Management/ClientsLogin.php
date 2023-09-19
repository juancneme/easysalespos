<?php

namespace App\Models\Management;

use Illuminate\Database\Eloquent\Model;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use App\Models\Management\Positions;
use App\Models\Evaluarte\UsersCalibrationSkills;

use App\Notifications\ResetPasswordNotification;
use DB;

class ClientsLogin extends Model implements AuthenticatableContract, AuthorizableContract, CanResetPasswordContract
{
    //
    protected $guard = 'clients';
    public $table = "clients_login";

    use Authenticatable, CanResetPassword; // Authorizable
    use EntrustUserTrait; // add this trait to your user model
    use Notifiable; //Mass assignable attributes

    protected $fillable = [
         'email', 'password',
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

    public function client(){
        return $this->hasOne('App\Models\Management\Client', 'id', 'client_id');
    }


}
