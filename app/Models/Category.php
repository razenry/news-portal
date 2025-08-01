<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name',
        'icon',
        'slug',
        'description',
    ];

    protected $dates = ['deleted_at'];

    public function blogs()
    {
        return $this->hasMany(Aspiration::class);
    }
}
