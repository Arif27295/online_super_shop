<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class shop_transection extends Model
{
    use HasFactory;
    protected $table = "shop_transections";
    protected $fillable = ['order_id','mode','status'];   		
}
