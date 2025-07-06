<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ScrollingHeading extends Model
{
    use HasFactory;

    protected $table = 'scrolling_headings';

    protected $fillable = [
        'name',
        'color',
        'background',
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
        return $this->hasMany(MultipleImage::class, 'scrolling_heading_id');
    }
}
