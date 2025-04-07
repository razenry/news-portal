<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommentAspiration extends Model
{
    protected $fillable = [
        'aspiration_id',
        'user_id',
        'content',
        'parent_id',
        'is_published',
    ];

    public function aspiration()
    {
        return $this->belongsTo(Aspiration::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function parent()
    {
        return $this->belongsTo(CommentAspiration::class, 'parent_id');
    }

    public function replies()
    {
        return $this->hasMany(CommentAspiration::class, 'parent_id')->orderBy('created_at');
    }
}
