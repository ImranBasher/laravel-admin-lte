<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FrequentlyAskQuestion extends Model
{
    use HasFactory;

    protected $table = 'frequently_asked_questions';

    protected $fillable = [
        'sub_service_category_id',
        'question',
        'answer',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function subServiceCategory()
    {
        return $this->belongsTo(SubServiceCategory::class);
    }
}
