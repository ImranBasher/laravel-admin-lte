<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MainBanner extends Model
{
        use HasFactory;
    protected $table = 'main_banners';

    protected $fillable = [
        'short_title',
        'long_title',
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
        return $this->hasMany(MultipleImage::class, 'main_banner_id');
    }
}
