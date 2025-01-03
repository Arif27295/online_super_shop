<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class sub_menu extends Model
{
    use HasFactory;
    protected $table = 'sub_menus';
    protected $fillable = ['name','menu_id'];
    
    public function menu(){
        return $this->belongsTo(menu::class);
    }
}
