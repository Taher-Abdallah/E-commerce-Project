<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Coupon extends Model
{
    use HasFactory;
    
    public function scopeIsValid($query)
    {
        return $query->WhereAny([
            ['end_date', '>', now()],
            ['is_active', 1],
            ['time_used','<','limit']
        ]);
    }

    public function scopeNotValid($query)
    {
        return $query->whereAny([
            ['end_date', '<', now()],
            ['is_active', 0],
            ['time_used','>','limit']
        ]);
    }

    Public function CopuonValid(){
        return $this->is_active == 1 && $this->end_date > now() && $this->time_used < $this->limit ;
    }

    public function getCreatedAtAttribute($value){
        return date('Y-m-d', strtotime($value));
    }

    public function StatusTranslate(){
        return $this->is_active == 1 ? 'Active' : 'Not Active';
    }
    
}
