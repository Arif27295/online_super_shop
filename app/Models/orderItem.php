<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class orderItem extends Model
{
    use HasFactory;
    protected $table = "order_items";
    protected $fillable = ['product_id','order_id','price','quantity','options','rstatus'];
    
    public function product(){
        return $this->belongsTo(product::class);
    }

    public function order(){
        return $this->belongsTo(order::class);
    }
    public function transection(){
        return $this->hasOne(transection::class);
    }
}
