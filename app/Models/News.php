<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class News extends Model
{
    protected $table = 'news';

    protected $fillable = [
        'user_id',
        'thumbnail',
        'gallery',
        'title',
        'slug',
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

    protected static function booted()
    {
        static::saving(function ($news) {
            if (empty($news->slug) || $news->isDirty('title')) {
                $baseSlug = Str::slug($news->title ?? '');
                if (empty($baseSlug)) {
                    $baseSlug = 'berita-' . ($news->id ?? time());
                }
                $slug = $baseSlug;
                $counter = 1;

                while (static::where('slug', $slug)->where('id', '!=', $news->id ?? 0)->exists()) {
                    $slug = "{$baseSlug}-{$counter}";
                    $counter++;
                }

                $news->slug = $slug;
            }
        });
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
