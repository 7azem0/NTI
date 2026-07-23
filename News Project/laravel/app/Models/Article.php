<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'summary',
        'content',
        'category',
        'tags',
        'meta_title',
        'meta_description',
        'featured',
        'published_at',
        'user_id'
    ];

    protected $casts = [
        'tags' => 'array',
        'featured' => 'boolean',
        'published_at' => 'datetime',
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}