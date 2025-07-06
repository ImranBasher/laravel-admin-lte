<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AboutUs extends Model
{
        use HasFactory;

    protected $table = 'about_us';

    protected $fillable = [
        'description_start',
        'description_middle',
        'description_end',
        'mechanics_title_start',
        'mechanics_title_end',
        'mechanics_description',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function multipleImages()
    {
        return $this->hasMany(MultipleImage::class, 'about_us_id');
    }
}
