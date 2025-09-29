<?php

namespace App\Repositories;

use App\Models\Country;
use App\Models\Governorate;

class LocationRepository
{
    
    public function getCountries()
    {
        return Country::when(!empty(request()->keyword), function ($query) {
            $query->where('name', 'like', '%' . request()->keyword . '%');
        })->paginate(8);
    }

    public function getGovByCountry($id)
    {
        return Governorate::where('country_id', $id)
        ->with(['country', 'shippingPrice', 'cities'])
        ->withCount('cities')
            ->when(!empty(request()->keyword), function ($query) {
                $query->where('name', 'like', '%' . request()->keyword . '%');
            })->paginate(8);
    }

    public function getCountryById($id)
    {
        $country = Country::FindOrfail($id);
        return $country;
    }

    public function getGovernorate($id)
    {
        $governorate = Governorate::FindOrfail($id);
        return $governorate;
    }

    public function changeStatus($id)
    {
        $country=Self::getCountryById($id);
        $status = $country->is_active == 'Active' || $country->is_active == 'مفعل'  ? 0 : 1;
        $country->update(['is_active' => $status,]);
        return $country;
    }
    public function changeGoverStatus($id)
    {
        $governorate=Self::getGovernorate($id);
        $status = $governorate->status == 'Active' || $governorate->status == 'مفعل'  ? 0 : 1;
        $governorate->update(['status' => $status,]);
        return $governorate;
    }

    public function shipping($id, $price)
    {
        $gov=self::getGovernorate($id);
        $gov->shippingPrice->update(['price' => $price,]);
        return $gov;
    }
}
