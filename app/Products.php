<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $guarded = [];

 


    public function category() {

        return $this->belongsTo(Categories::class , 'category_id' , 'serial');

    }

    public function brand() {

        return $this->belongsTo(Brands::class , 'brand_id' , 'serial');

    }


    public function type() {

        return $this->belongsTo(Types::class , 'type_id' , 'serial');

    }

    public function unit_prices() {

        return $this->hasMany(ProductsUnits::class , 'product_id' );

    }

    public function mother_product() {

        return $this->belongsTo(MotherProducts::class , 'mother_product_id' , 'serial');

    }


    public function pfeature_1() {

        return $this->belongsTo(Features::class , 'feature_1'  , 'serial');

    }

    public function pfeature_2() {

        return $this->belongsTo(Features::class , 'feature_2'  , 'serial');

    }



public function pfeature_3() {

        return $this->belongsTo(Features::class , 'feature_3'  , 'serial');

}

public function suppliers() {

        return $this->belongsToMany( Supplier::class , 'products_suppliers' , 'product_id' , 'supplier_id');

}

public function products_complementary() {

    return $this->belongsToMany( Products::class , 'products_complementary' , 'product_id' , 'complementary_product_id');

}


public function products_repositories() {

    return $this->hasMany( ProductsRepositories::class  , 'product_id' );

}



public function products_local_suppliers() {

    return $this->hasMany( ProductsSuppliers::class  , 'product_id' );

}





public function photos() {

    return $this->hasMany(ProductsPhotos::class , 'product_id' );

}
    public function supliers()
    {
        return $this->belongsToMany(Supplier::class,'products_suppliers','product_id','supplier_id');
    }

}
