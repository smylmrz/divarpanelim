<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Settings extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $fillable = [
        'title',
        'tagline',
        'description',
        'logo',
        'footer_logo',
        'copyright',
        'phone',
        'address',
        'keywords'
    ];

    public $translatable = ['title', 'tagline', 'description', 'copyright', 'address'];

}
