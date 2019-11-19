<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class ProductsRepositories extends Model
{
    protected $guarded = [];
    protected $table = 'products_repositories';


 
    public function repository() {

        return $this->belongsTo(Repositories::class , 'repositories_id' , 'id');

    }

}
