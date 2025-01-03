<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class shop_order_items extends Model
{
    use HasFactory;
    protected $table = "shop_order_items";
    protected $fillable = ['product_id','order_id','price','options','rstatus'];	
    	
    public function product() {
        return $this->belongsTo(product::class);
    }  
}
