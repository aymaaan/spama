<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class OrderStop extends Model
{
    protected $guarded = [];
    protected $table = 'order_stops';

    protected $casts = [
        'branch_stop' => 'array',
        'customer_stop' => 'array',
        'other_stop' => 'array'
    ];
}
