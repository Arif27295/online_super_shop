<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class transection extends Model
{
    use HasFactory;
    protected $table = "transections";
    protected $fillable = ['product_id','order_id','mode','status'];
    
    public function order(){
        return $this->belongsTo(order::class);
    }
}
