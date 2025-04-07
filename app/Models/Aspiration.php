<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Aspiration extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'body',
        'published',
        'comments_enabled',
        'user_id',
        'category_id',
        'unit_id',
    ];

    protected $casts = [
        'comments_enabled' => 'boolean',
        'published' => 'boolean',
    ];


    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class);
    }

    public function comment(): HasMany
    {
        return $this->hasMany(CommentAspiration::class)
            ->whereNull('parent_id')
            ->where('is_published', true)
            ->orderBy('created_at', 'desc');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(CommentAspiration::class)
            ->whereNull('parent_id')
            ->orderBy('created_at');
    }

    public function allComments(): HasMany
    {
        return $this->hasMany(CommentAspiration::class);
    }

}
