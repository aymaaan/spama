<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $guarded = [];
    
 
    public function nationality_info() {

        return $this->belongsTo( Nationality::class , 'nationality' );
     
      }


      public function department() {

        return $this->belongsTo(Department::class , 'department_id');
     
    }
         
    public function manager() {

      return $this->belongsTo(User::class , 'manager_id');
   
  }
}
