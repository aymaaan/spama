<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class CustomersAssessmentProducts extends Model
{
    protected $guarded = [];
    protected $table = 'customers_assessment_products';


public function info() {

        return $this->belongsTo(Products::class , 'product_id' );

    }


    public function unit() {

        return $this->belongsTo(Units::class , 'unit_id' );

    }

    public function user() {

        return $this->hasMany( User::class , 'id' ,'user_id' );
     
      }
  
}
