<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class NamesMotherProducts extends Model
{
    protected $guarded = [];
    protected $table = 'names_mother_products';



public function features() {

    return $this->hasMany('App\Features' , 'name_id')->where('parent_id',0);


}

}
