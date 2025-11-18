<?php

namespace App\Livewire\User\Checkout;

use App\Models\City;
use App\Models\Country;
use Livewire\Component;
use App\Models\Governorate;
use App\Models\ShippingGovernorate;

class ShippingDetails extends Component
{
    public $countryId,$governorateId,$cityId;

    public function updatedGovernorateId()
    {
        $price=ShippingGovernorate::where('governorate_id', $this->governorateId)->first()->price;
        $this->dispatch('shipping-price', $price);
    }
    public function render()
    {
        $countries= Country::get();
        $governorates= $this->countryId ? Governorate::where('country_id', $this->countryId)->get() : [];
        $cities= $this->governorateId ? City::where('governorate_id', $this->governorateId)->get() : [];
        return view('livewire.user.checkout.shipping-details',get_defined_vars());
    }
}
