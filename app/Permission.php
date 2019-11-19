<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
class Permission extends Model
{
  protected $guarded = ['_token'];

  
  public function roles() {

   return $this->belongsToMany(Role::class);

 }




 public function list_permissions() {

  return $this->hasMany(Permission::class , 'parent_id' , 'id')->where('parent_id' , '!=' , 0);

}


}
