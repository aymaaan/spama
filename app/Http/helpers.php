<?php


function ClearCache($table) {

    foreach ( \App\Language::get() as $Language) {
    \Cache::forget($table.$Language->code);
}
}



function GetDescription($lng , $serial , $product_id) {
  $desc = \App\AssessmentProductsDescriptions::where('serial',$serial)
    ->where('product_id',$product_id)->first();
    if( !$desc ) {
      $desc = \App\Products::find($product_id);
    }
    return $desc['description_'.$lng];
}

function LangUser ($lang) {

if (!$lang) {
    if (!\Cookie::get('LANGIMCTGroup')) {
    \Cookie::queue('LANGIMCTGroup', config('settings.DefaultLanguage') );
    $langUser = config('settings.DefaultLanguage');
    \App::setLocale(config('settings.DefaultLanguage'));
     } else {
    $langUser = \Cookie::get('LANGIMCTGroup' );
    \App::setLocale($langUser);
     }
    
    } else {
    \Cookie::forget('LANGIMCTGroup');
    if(in_array($lang, \App\Language::pluck('code')->toArray())) {
    \Cookie::queue('LANGIMCTGroup', $lang );
    \App::setLocale($lang);
    $langUser = $lang;
} else {

    $langUser = \Cookie::get('LANGIMCTGroup' );
}
    
    
    }

    return $langUser;

}

function generate_serial($table) {
  $last = \DB::table($table)->orderby('serial' ,'desc')->where('serial' , '!=' , '999')->first();
  if(!$last) {
    $last = 0;
  } else {
    $last = $last->serial;
  }
  $last = (int)$last;
  if($last < 9) {
  $serial = "00" . ( $last + 1 );
  } elseif( $last < 99 ) {
    $serial = "0". ( $last + 1 );
  } elseif($last < 999) {
    $serial = $last + 1 ;
  } elseif($last >= 999) {
    //dd('You reach maximum limit of serial');
  } 
  return $serial;
}


function generate_single_serial($table , $parent = null , $limit = 9) {

if (isset( $parent )) {
 
$last = \DB::table($table)->where('parent_id' , $parent)->orderby('serial' ,'desc')
->first();
} else {
  $last = \DB::table($table)->orderby('serial' ,'desc')->first();
}

  if( $last ) {
  if( $last->serial < $limit ) {
    $serial = $last->serial + 1 ;
  } else {
    dd('You reach maximum limit of serial');
  }

  } else {

    $serial = 1 ;
    
  }  


  return $serial;


}


function generate_product_serial($table , $parent = null , $limit = 9) {

if (isset( $parent )) {
 
$last = \DB::table($table)->where('products_id' , $parent)->orderby('serial' ,'desc')
->first();
} else {
  $last = \DB::table($table)->orderby('serial' ,'desc')->first();
}

  if( $last ) {
  if( $last->serial < $limit ) {
    $serial = $last->serial + 1 ;
  } else {
    dd('You reach maximum limit of serial');
  }

  } else {

    $serial = 1 ;
    
  }  


  return $serial;


}



function generate_2digits_serial($table) {
  $last = \DB::table($table)->orderby('serial' ,'desc')->where('serial' , '!=' , '99')->first();
  if(!$last) {
    $last = 0;
  } else {
    $last = $last->serial;
  }
  $last = (int)$last;
  if($last < 9) {
  $serial = "0" . ( $last + 1 );
  } elseif( $last < 99 ) {
    $serial =  ( $last + 1 );
  } 
  return $serial;
}




function coupoun () {


$chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
$res = "";
for ($i = 0; $i < 5; $i++) {
    $res .= $chars[mt_rand(0, strlen($chars)-1)];
}

return $res;

}



