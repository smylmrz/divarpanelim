<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $fillable = [
        'name',
        'sku',
        'slug',
        'description',
        'price',
        'length',
        'height',
        'width',
        'image',
        'category_id',
    ];

    public $translatable = [
        'name',
        'description',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
