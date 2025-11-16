<?php

namespace App\Models;

use App\Models\Brand;
use App\Models\Category;
use App\Models\ProductTag;
use App\Models\ProductImage;
use Spatie\Sluggable\HasSlug;
use App\Models\ProductPreview;
use App\Models\ProductVariant;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasSlug;

    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function getPriceAfterDiscount()
    {
        if ($this->discount) {
            return $this->price - $this->discount;
        }
        return $this->price;
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function productPreviews()
    {
        return $this->hasMany(ProductPreview::class);
    }

    public function productImages()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function productTags()
    {
        return $this->belongsToMany(ProductTag::class, 'product_tags');
    }

    public function productVariants()
    {
        return $this->hasMany(ProductVariant::class);
    }
}
