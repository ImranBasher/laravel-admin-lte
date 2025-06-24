<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use HasFactory;

    // Optional: If table name differs from model name
    protected $table = '';

    // Fields that can be mass-assigned
    protected $fillable = [

    ];

    // Optional: Casts for automatic type conversion
    protected $casts = [
        'status' => 'boolean',
    ];

    // Optional: For date handling
    protected $dates = [
        'created_at',
        'updated_at',
    ];
}
