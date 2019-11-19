<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class MotherProducts extends Model
{
    protected $guarded = [];
    protected $table = 'mother_products';





public function names() {

    return $this->hasMany('App\NamesMotherProducts' , 'products_id');


}






public function products() {

    return $this->hasMany('App\Products' , 'mother_product_id' , 'serial');


}



 

}
