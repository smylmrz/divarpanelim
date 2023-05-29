<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'subtitle',
        'slug',
        'body',
        'image',
        'is_published'
    ];

    public function scopeIsPublished()
    {
        return $this->where('is_published', true);
    }
}
