<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class News extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'cover_img',
        'content',
        'author_id',
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
