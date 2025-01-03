<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class hold_product extends Model
{
    use HasFactory;
    protected $table = 'hold_products';
    protected $fillable = ['product_id','price','quantity'];
}
