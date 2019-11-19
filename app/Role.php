<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $guarded = ['_token','permissions'];
	

    public function permissions() {

    	return $this->belongsToMany(Permission::class);

    }



    public function assign(Permission $permission) {

    	return $this->permission()->save($permission);

    }
	
	
	public function users() {

    return $this->belongsToMany('App\User', 'role_user', 
      'role_id', 'user_id');


  }









}
