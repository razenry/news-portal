<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'body',
        'description',
        'image',
        'user_id',
        'unit_id',
        'category_id',
        'tags',
        'published',
    ];

    protected $dates = ['deleted_at'];

    protected $casts = [
        'tags' => 'array', // Konversi JSON ke array otomatis
        'published' => 'boolean',
    ];

    /**
     * Relasi ke User (Author)
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Relasi ke Unit
     */
    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class);
    }

    /**
     * Relasi ke Category
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Relasi ke Komentar
     */
    // public function comments(): HasMany
    // {
    //     return $this->hasMany(Comment::class);
    // }
}
