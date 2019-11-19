<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class ProductsUnits extends Model
{
    protected $guarded = [];
    protected $table = 'products_units';

    
    public function unit() {

        return $this->belongsTo(Units::class , 'unit_id' , 'id');

    }
    
    
    

}
