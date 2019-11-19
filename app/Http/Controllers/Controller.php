<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;



public function ar_query($text){
$replace = array(
"أ",
"ا",
"إ",
"آ",
"ي",
"ى",
"ه",
"ة",
); 
$with = array("(أ|ا|آ|إ)",
"(أ|ا|آ|إ)",
"(أ|ا|آ|إ)",
"(أ|ا|آ|إ)",
"(ي|ى)",
"(ي|ى)",
"(ه|ة)",
"(ه|ة)",
);
$new = array_combine($replace,$with);
$return = "" ;
$len = strlen(utf8_decode($text));
for($i=0;$i<$len;$i++){
$current = mb_substr($text,$i,1,'utf-8');
if(isset($new[$current])){
$return.=$new[$current];
}
else{
$return.=$current;
}
}
return $return;
}


}
