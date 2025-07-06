<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ServiceSection extends Model
{
    use HasFactory;

    protected $table = 'service_sections';

    protected $fillable = [
        'title',
        'title_start',
        'title_middle',
        'title_end',
        'description',
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
        return $this->hasMany(MultipleImage::class, 'service_section_id');
    }
}
