<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class weekend_banner extends Model
{
    use HasFactory;
    protected $table = 'weekend_banners';
    protected $fillable = ['image', 'title', 'subtitle','discount_offer'];
}
