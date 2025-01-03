<?php

namespace App\Models;

use App\Models\images;
use App\Models\Review;
use App\Models\orderItem;
use App\Models\subCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class product extends Model
{
    use HasFactory;
    protected $table = "products";
    protected $fillable = ['name','slug','tags','pro_discount','short_description','description','image','images','regular_price','sale_price','SKU','qty','stock','featured','category_id','brand_id'];

    public function category(){
        return $this->belongsTo(category::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function subCategory() {
        return $this->belongsTo(SubCategory::class, 'subcategory_id', 'id');
    }

    public function brand(){
        return $this->belongsTo(brand::class);
    }
    public function images(){
        return $this->hasMany(images::class);
    }
    public function orderItem(){
        return $this->hasMany(OrderItem::class, 'product_id');
    }
    public function shop_order_items(){
        return $this->hasMany(shop_order_items::class);
    }



    public function reviews(){
        return $this->hasMany(Review::class);
    }

    public function averageRating(){
        return $this->reviews()->avg('rating') ?? 0;
    }
    public function reviewCountFor(){
        return $this->reviews()->count() ?? 0;
    }

}

