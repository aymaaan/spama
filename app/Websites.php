<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Websites extends Model
{
    protected $guarded = [];
    protected $table = 'websites';


   
    public function fields() {

        return $this->hasMany( WebsitesFields::class , 'websites_id' );
     
      }      
    

}
