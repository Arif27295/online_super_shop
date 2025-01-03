<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class subCategory extends Model
{
    use HasFactory;
    protected $table = 'sub_categories';
    protected $fillable = ['name','slug','category_id'];
   
    public function category(){
        return $this->belongsTo(category::class);
    }
    public function product(){
        return $this->hasMany(product::class);
    }
}
