<?php

namespace App\Models;

use App\Models\product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class product extends Model
{
    use HasFactory;

    protected $primaryKey = 'productid';

    public function cart(){
        return $this->hasMany('App\Models\cart', 'productid', 'id');
    }

    public function menudet(){
        return $this->belongsTo('App\Models\menu', 'menu');
    }
}
