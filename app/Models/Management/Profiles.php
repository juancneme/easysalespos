<?php namespace App\Models\Management;

use Illuminate\Database\Eloquent\Model;

class Profiles extends Model {

	public $timestamps = false;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['user_id'];
	
	public function user(){
		return $this->hasOne('App\Models\Management\User', 'id', 'user_id');
	}
}
