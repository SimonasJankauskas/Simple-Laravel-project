<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    public $fillable = ['title', 'price', 'weight', 'meat', 'about'];

    public function restaurants(){
        return $this->hasMany('App\Models\Restaurant');
    }

}
