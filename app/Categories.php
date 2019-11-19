<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $guarded = [];
    protected $table = 'categories';



public function mother_products() {

   return $this->hasMany(MotherProducts::class ,'categories_id');


}


public function photos() {

    return $this->hasMany(CategoriesPhotos::class , 'product_id' );

}

 

}
