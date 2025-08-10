<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ServiceCategory extends Model
{
    use HasFactory;

    protected $table = 'service_categories';

    protected $fillable = [
        'service_name',
        'short_title',
        // 'long_title',
        // 'description',
        // 'quantity',
        'status',

        'meta_title',  
        'meta_keywords',
        'meta_description',
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
        return $this->hasMany(MultipleImage::class, 'service_category_id');
    }

        // Add this relationship method
    public function subServiceCategories()
    {
        return $this->hasMany(SubServiceCategory::class, 'service_category_id');
    }
}
