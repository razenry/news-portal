<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Unit extends Model
{
    /** @use HasFactory<\Database\Factories\UnitFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'logo',
        'description',
    ];

    protected $casts = [
        'deleted_at' => 'datetime',
    ];

    public function blogs()
    {
        return $this->hasMany(Aspiration::class);
    }
    
    protected $dates = ['deleted_at'];
}
