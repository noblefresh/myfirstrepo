<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    use HasFactory;

    public function product(){
        return $this->belongsTo('App\Models\product', 'productid');
    }
}
