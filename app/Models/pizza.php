<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pizza extends Model
{
    use HasFactory;
    protected $fillable = [
        'pizza_id','pizza_name','image',
        'price','publish_status',
        'category_id','discount_price',
        'by_one_get_one_status','waiting_time',
        'description',

    ];
    public function orders(){
        return $this->belongsToMany('App\Order','order_details')
                    ->withPivot('qty','price')
                    ->withTimestamps();
    }
}
