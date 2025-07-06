<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WhyChoose extends Model
{
    use HasFactory;

    protected $table = 'why_chooses';

    protected $fillable = [
        'title_start',
        'title_end',
        'video_link',
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
        return $this->hasMany(MultipleImage::class, 'why_choose_id');
    }
}
