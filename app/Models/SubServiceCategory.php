<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubServiceCategory extends Model
{
    use HasFactory;

    protected $table = 'sub_service_categories';

    protected $fillable = [
        'service_category_id',
        'sub_service_name',
        'banner_short_title',
        'banner_long_title',
        'banner_description',
        'service_introduction_description',
        'key_services_list',
        'key_service_description',
        'features_and_benefit_list',
        'features_and_benefit_description',
        'how_do_we_work_list',
        'how_do_we_work_description',
        'expected_result_list',
        'expected_result_description',
        'quantity',
        'svg_icon',
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
        return $this->hasMany(MultipleImage::class, 'sub_service_category_id');
    }

    public function serviceCategory()
    {
        return $this->belongsTo(ServiceCategory::class, 'service_category_id');
    }
}
