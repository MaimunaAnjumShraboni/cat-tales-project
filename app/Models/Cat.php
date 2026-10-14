<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cat extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'age',
        'sex',
        'breed',
        'description',
        'img',
        'vaccinated',
        'availability',
    ];

}
