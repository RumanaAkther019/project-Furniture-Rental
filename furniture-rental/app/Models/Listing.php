<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    protected $table = 'listings';
    
    protected $fillable = [
        'item_name',
        'condition',
        'rent_per_month',
        'availability'
    ];

    protected $casts = [
        'availability' => 'boolean',
    ];
}