<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Characteristics extends Model
{
    public function Product()
    {
        return $this->belongsToMany(Product::class);
    }

    use HasFactory;
}
