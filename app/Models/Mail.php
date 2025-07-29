<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mail extends Model
{
    use HasFactory;

    protected $table = 'mails';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'subject',
        'message',
        'read_data',
    ];

    protected $dates = ['created_at', 'updated_at'];
}
