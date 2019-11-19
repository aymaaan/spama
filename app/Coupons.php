<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Coupons extends Model
{
    protected $guarded = [];
    protected $table = 'coupons';


    

    public function products() {

        return $this->hasMany( ProductsCoupons::class , 'coupon_id' );
     
    }
         


}
