<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use App\ProductsWebsitesFields;
class WebsitesFields extends Model
{
    protected $guarded = [];
    protected $table = 'websites_fields';


    public function category_value($cat) {

        if ($cat != null) {

        $value = $this->hasOne( CategoriesWebsitesFields::class , 'field_id' )->where('product_id',$cat)->first();

        if  ( isset($value->value) ) {
            return $value->value;
        } else {
            return null;
        }

    } else {

        return null;
    }


         
     
      } 






public static function GetFieldValue($field_id  , $product_id) {

$value = ProductsWebsitesFields::where('product_id', $product_id)->where('field_id', $field_id)->first();

if($value) {

    $value = $value->value;
} else {
    $value = null;
}

return $value ;
       
    }






}
