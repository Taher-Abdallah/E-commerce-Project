<?php

namespace App\Models;

use App\Models\City;
use App\Models\Country;
use Illuminate\Database\Eloquent\Model;

class Governorate extends Model
{
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function cities()
    {
        return $this->hasMany(City::class);
    }

    public function shippingPrice()
    {
        return $this->hasOne(ShippingGovernorate::class, 'governorate_id');
    }

    public function users(){
        return $this->hasMany(User::class);
    }
    

    public function getStatusAttribute($value)
    {
        if(config('app.locale') == 'ar'){
            return $value == 1 ? 'مفعل' : 'غير مفعل';
        }
        return $value == 1 ? 'Active' : 'Inactive';
    }
}
