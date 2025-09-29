<?php

namespace App\Models;

use App\Models\User;
use App\Models\Governorate;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    
    public function governorates()
    {
        return $this->hasMany(Governorate::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function getIsActiveAttribute($value)
    {
        if(config('app.locale') == 'ar'){
            return $value ? 'مفعل' :'غير مفعل';
        }
        return $value ? 'Active' :'Not Active';
    }
}
