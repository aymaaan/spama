<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class SalesChannels extends Model
{
    protected $guarded = [];
    protected $table = 'sales_channels';

    
   
    public function delegates() {

        return $this->hasMany( SalesDelegates::class , 'channel_id' );
     
      }


}
