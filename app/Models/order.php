<?php

namespace App\Models;

use App\Models\orderItem;
use App\Models\transection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class order extends Model
{
    use HasFactory;
    protected $table="orders";
    protected $fillable = [
        'user_id',
        'subtotal',
        'discount',
        'tax',
        'total',
        'name',
        'phone',
        'locality',
        'address',
        'city',
        'state',
        'country',
        'landmark',
        'zip',
        'type',
        'status',
        'is_shipping_different',
        'delivered_date',
        'canceled_date'
    ];
    
    public function User(){
        return $this->belongsTo(User::class);
    }
    public function orderItem(){
        return $this->hasMany(orderItem::class);
    }
    public function product(){
        return $this->hasMany(product::class);
    }

    public function transections(){
        return $this->hasMany(transection::class);
    }
    public function transection(){
        return $this->hasOne(transection::class);
    }
}
