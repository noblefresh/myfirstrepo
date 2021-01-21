<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class menu extends Model
{
    use HasFactory;

    protected $primaryKey = 'menuid';

    public function products(){
        return $this->hasMany('App\Models\product');
    }
}
