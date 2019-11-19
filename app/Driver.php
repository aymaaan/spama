<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    protected $guarded = [];
    protected $table = 'drivers';

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function photos() {

        return $this->hasMany(DriverPhotos::class , 'driver_id' );

    }
  
}
