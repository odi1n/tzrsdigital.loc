<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function characteristics()
    {
        return $this->belongsToMany(Characteristics::class);
    }

    use HasFactory;
}
