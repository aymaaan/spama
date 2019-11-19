<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    protected $guarded = [];
    protected $table = 'customers';

    

    public function customer_case() {

        return $this->belongsTo(CustomersCases::class , 'customer_case_id');

    }

    public function sales_channel() {

        return $this->belongsTo(SalesChannels::class , 'sales_channel_id');

    }
    
    public function age_group_title() {

        return $this->belongsTo(AgeCtegories::class , 'age_group');

    }
    
    
    public function diseases() {

        return $this->belongsTo(Diseases::class , 'disease_type');

    }
    

    public function doctors() {

        return $this->belongsTo(Doctors::class , 'doctor_id');

    }

    public function followed_delegate() {

        return $this->belongsTo(SalesDelegates::class , 'followed_delegate_id');

    }

       
    public function managers() {

        return $this->hasMany( CustomersCorporateManagers::class , 'customer_id' );
     
      }



}
