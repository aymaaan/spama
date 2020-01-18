<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class EmployeesCustodies extends Model
{
    protected $guarded = [];
    protected $table = 'employees_custodies';

public function custody() {

      return $this->belongsTo(CustodyTypes::class , 'custody_id');
   
  }
  
  
}
