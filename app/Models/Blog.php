<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use HasFactory;

    protected $table = 'blogs';

    protected $fillable = [
        'title',
        'slug',
        'author_id',
        'description_1',
        'description_3',
        'description_2',
        'description_4',
        'published_at',
        'status',
    ];

    protected $casts = [
        'status'        => 'boolean',
        'published_at' => 'date'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function multipleImages()
    {
        return $this->hasMany(MultipleImage::class, 'blog_id');
    }

    public function author()
    {
        return $this->belongsTo(Author::class, 'author_id');
    }
}
