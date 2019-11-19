<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Language extends Model
{
    protected $guarded = [];
    use SoftDeletes;



public static function LanguageList() {

return \Cache::rememberForever('LanguageList', function() {
    return Language::whereStatus(1)->orderby('id','asc')->get();
});
   
}


}
