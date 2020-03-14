<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Repositories extends Model
{
    protected $guarded = [];
    protected $table = 'repositories';


    public function products_list() {

        return $this->belongsToMany('App\Products', 'products_repositories' , 'repositories_id', 'product_id')->withPivot('product_id', 'repositories_id','quantity_each_repository','minimum_quantity_each_repository','maximum_quantity_each_repository');
     
    }

}
