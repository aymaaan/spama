<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $guarded = [];

    
    
   public function products() {

   return $this->belongsToMany( Products::class , 'products_suppliers' , 'supplier_id' , 'product_id' );

 }

    
    
    
    
   
    public function delegates() {

   return $this->hasMany( SupplierDelegates::class , 'suppliers_id' );

 }
    
    

}
