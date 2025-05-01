<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ppdb extends Model
{
    use HasFactory, SoftDeletes;

    public $fillable = [
        'slug,',
        'name',
        'content',
        'image',
        'unit_id',
    ];

    public $dates = [
        'deleted_at'
    ];


    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class);
    }
}
