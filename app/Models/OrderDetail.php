<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{

    public function customer()
    {
        return $this->belongsTo('App\Models\Product');
    }

    use HasFactory;
}
