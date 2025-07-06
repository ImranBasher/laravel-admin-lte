<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';

    protected $fillable = [
        'user_id', 'name', 'email', 'message', 'status'
    ];

    protected $casts = [
        'status' => 'boolean',
    ];
}
