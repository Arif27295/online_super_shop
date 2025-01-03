<?php

namespace App\Models;

use App\Models\product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $fillable = ['name','slug','image'];

    public function subcategories(){
        return $this->hasMany(Subcategory::class);
    }
    public function product(){
        return $this->hasMany(product::class);
    }

}
