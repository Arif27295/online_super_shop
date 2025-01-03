<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class shop_order extends Model
{
    use HasFactory;
    protected $table = "shop_orders";
    protected $fillable = ['invoice','subtotal','discount','total','paid','due','name','phone','email','address','type','status','return_date'];	
    
    public function shop_order_items(){
        return $this->hasMany(shop_order_items::class, 'order_id' , 'id');
    }
    
    public function shop_transection(){
        return $this->hasMany(shop_transection::class, 'order_id' , 'id');
    }
}	