<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class brand extends Model
{
    use HasFactory;
    protected $table = 'brands';
    protected $fillable = ['name', 'slug', 'image'];
    
    public function product(){
        return $this->hasMany(product::class);
    }
}
