<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MultipleImage extends Model
{
      protected $table = 'multiple_images';

    protected $fillable = [
        'image',
        'type',
        'purpose',
        'sort_order',
        'general_setting_id',
        'main_banner_id',
        'service_category_id',
        'sub_service_category_id',
        'service_section_id',
        'motivation_id',
        'scrolling_heading_id',
        'why_choose_id',
        'facility_id',
        'service_price_package_id',
        'blog_id',
        'footer_banner_id',
        'my_company_page_banner_id',
        'about_us_id',
        'author_id',
        'worker_id',
        'product_id',
        'customer_review_id'

        
    ];

    public function generalSetting()
    {
        return $this->belongsTo(GeneralSetting::class, 'general_setting_id');
    }   
}
