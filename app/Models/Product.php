<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
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

    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class);
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
