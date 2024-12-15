<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //

    protected $fillable = ['user_id', 'address', 'total_price', 'status', 'buyer_note', 'seller_note'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    // Relationship: An order can have many order details
    // Relationship: An order can have many order details
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
