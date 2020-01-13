<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];
    protected $table = 'orders';

    public function data() {

        return $this->hasOne(Employee::class , 'employee_id');

    }
}
