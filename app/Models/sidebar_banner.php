<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class sidebar_banner extends Model
{
    use HasFactory;
    protected $table = 'sidebar_banners';
    protected $fillable = ['image', 'title', 'tag','subtitle','price'];
}
