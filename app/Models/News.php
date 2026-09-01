<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class News extends Model
{
    protected $table = 'news';

    protected $fillable = [
        'user_id',
        'thumbnail',
        'gallery',
        'title',
        'description',
        'content',
        'status',
        'category',
        'is_featured',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'gallery'     => 'array',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
