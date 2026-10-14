<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'cat_name',
        'cat_age',
        'cat_sex',
        'cat_breed',
        'cat_image',
        'delivery_status',
    ];
}
