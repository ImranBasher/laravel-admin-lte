<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PricingPackage extends Model
{
        protected $fillable = [
        'name', 'subtitle', 'monthly_price', 'yearly_price', 
        'features', 'is_popular', 'tag_text'
    ];
    
    protected $casts = [
        'features' => 'array',
        'is_popular' => 'boolean'
    ];
}
