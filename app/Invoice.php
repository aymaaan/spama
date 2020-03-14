<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $guarded = [];
    protected $table = 'invoices';

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function invoice_details() {

        return $this->hasMany(Invoice_details::class , 'invoice_id' );

    }
  
}
