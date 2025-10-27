<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
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
