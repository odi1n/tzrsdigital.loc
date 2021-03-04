<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function properties()
    {
        return $this->belongsToMany(Properties::class);
    }

    use HasFactory;
}
