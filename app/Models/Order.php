<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable =[
        'order_id','customer_id',
        'voucher_number','total_price',
        'payment_status',
        'order_date',
    ];
    public function pizzas(){
        return $this->belongsToMany(pizza::class,'order_details')
                    ->withPivot('qty','price')
                    ->withTimestamps();
    }
}
