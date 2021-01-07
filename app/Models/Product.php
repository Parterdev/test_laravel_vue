<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

//Datos masivos
    protected $fillable = [
        'name',
        'code',
        'slug',
    ];
}
