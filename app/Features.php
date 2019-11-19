<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Features extends Model
{
    protected $guarded = [];
    protected $table = 'features_products';


    
    public function sub_features() {

    return $this->hasMany('App\Features' , 'parent_id');

    
}



}
