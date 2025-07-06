<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GeneralSetting extends Model
{
        use HasFactory;

    // Optional: If table name differs from model name
    protected $table = 'general_settings';

    // Fields that can be mass-assigned
    protected $fillable = [
        'company_name_start',
        'company_name_middle',
        'company_name_end',
        'phone',
        'contact_title',
        'email',
        'address',
        'working_time',
        'facebook_link',
        'twitter_link',
        'instagram_link',
        'linkedin_link',
        'map_link',
        'logo',
        'contact_us_logo',
        'blog_header_banner',
        'status',
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


    public function multipleImages()
    {
        return $this->hasMany(MultipleImage::class, 'general_setting_id');
    }
}
