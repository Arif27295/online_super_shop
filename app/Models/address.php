<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class address extends Model
{
    use HasFactory;
    protected $table = "addresses";
    protected $fillable = ['user_id','name','phone','locality','address','city','state','country','landmark','zip','type','isdefault'];	

    public function User(){
        return $this->belongsTo(User::class);
    }
}
