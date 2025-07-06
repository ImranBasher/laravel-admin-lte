<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FooterBanner extends Model
{
    use HasFactory;

    protected $table = 'footer_banners';

    protected $fillable = [
        'title_a',
        'title_b',
        'phone',
        'button_text',
        'button_link',
        'status'
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
        return $this->hasMany(MultipleImage::class, 'footer_banner_id');
    }
}
