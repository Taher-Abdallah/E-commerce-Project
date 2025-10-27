<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function variantAttributes()
    {
        return $this->hasMany(VariantAttribute::class, 'product_variant_id');
    }

    // Helper methods للوصول السريع
    public function getColorAttribute()
    {
        $colorAttr = Attribute::where('name', 'color')->first();
        if (!$colorAttr) return null;

        return $this->attributeValues()
            ->wherePivot('attribute_id', $colorAttr->id)
            ->first();
    }

    public function getSizeAttribute()
    {
        $sizeAttr = Attribute::where('name', 'size')->first();
        if (!$sizeAttr) return null;

        return $this->attributeValues()
            ->wherePivot('attribute_id', $sizeAttr->id)
            ->first();
    }
}
