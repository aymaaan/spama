<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class ProductsCoupons extends Model
{
    protected $guarded = [];
    protected $table = 'products_coupons';

    
    public function product() {

        return $this->belongsTo( Products::class , 'product_id' );
     
    }

}
