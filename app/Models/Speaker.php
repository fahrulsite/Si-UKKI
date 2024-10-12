<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Speaker extends Model
{
    use HasFactory;
    protected $fillable = [
        'image',
        'name',
        'bio',
        'tag',
        'contact',
    ];

    protected $casts = [
        'tag' => 'array',
    ];
}
