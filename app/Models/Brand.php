<?php

namespace App\Models;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasSlug;
    public function products()
    {
        return $this->hasMany(Product::class);
    }


    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }
    public function translateStatus()
    {
        if (config('app.locale') == 'ar') {
            return $this->status == 1 ? 'مفعل' : 'غير مفعل';
        }
        return $this->status == 1 ? 'Active' : 'Inactive';
    }

    public function getCreatedAtAttribute($value)
    {
        return date('Y-m-d H:i', strtotime($value));
    }   
}
 