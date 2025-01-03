<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class images extends Model
{
    use HasFactory;
    protected $table = 'images';
    protected $fillable = ['images','images_id']; 
}
