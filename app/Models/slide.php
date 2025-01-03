<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class slide extends Model
{
    use HasFactory;
    protected $table = 'slides';
    protected $fillable = ['image', 'title', 'discount_offer','subtitle','description','price'];
}
