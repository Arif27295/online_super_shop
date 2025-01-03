<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class menu extends Model
{
    use HasFactory;
    protected $table = 'menus';
    protected $fillable = ['name','image'];

    public function sub_menu(){
        return $this->hasMany(sub_menu::class);
    }
}
