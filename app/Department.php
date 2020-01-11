<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $guarded = [];
    protected $table = 'departments';

    public function sub_department() {

        return $this->hasMany(Department::class , 'parent_id')->where('parent_id' , '=' , $this->id );
      
      }

      public function parentSection() {

        return $this->belongsTo(Department::class , 'parent_id');
      
      }

      public function DirectManager() {

        return $this->belongsTo(User::class , 'direct_manager');
      
      }

      

}
