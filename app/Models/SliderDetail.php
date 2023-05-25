<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class SliderDetail extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $fillable = [
        'title',
        'content',
        'primary_action_text',
        'primary_action_url',
        'secondary_action_text',
        'secondary_action_url',
    ];

    public $translatable = [
        'title',
        'content',
        'primary_action_text',
        'secondary_action_text',
    ];
}
