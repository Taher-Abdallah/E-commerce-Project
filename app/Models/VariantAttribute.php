<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VariantAttribute extends Model
{
    // Relation with Product Variant
    public function productVariant()
    {
        return $this->belongsTo(ProductVariant::class);
    }

    // Relation with Attribute Value
    public function attributeValue()
    {
        return $this->belongsTo(AttributeValue::class,'attribute_value_id');
    }
}
