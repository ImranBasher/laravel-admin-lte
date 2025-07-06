<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CustomerReview extends Model
{
    use HasFactory;

    protected $table = 'customer_reviews';

    protected $fillable = [
        'customer_name',
        'place',
        'customer_message',
        'rating',
        'company',
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
        return $this->hasMany(MultipleImage::class, 'customer_review_id');
    }
}

