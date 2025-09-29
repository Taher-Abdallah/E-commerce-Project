<?php

namespace App\Http\Controllers\Admin;

use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ShippingRequest;
use App\Models\Governorate;
use App\Services\LocationService;

class LocationController extends Controller
{
    protected $locationService;
    public function __construct(LocationService $locationService)
    {
        $this->locationService = $locationService;
    }
    public function countries()
    {
        $countries = $this->locationService->getCountries();
        return view('admin.locations.countries', compact('countries'));
    }

    public function getGovernorateByCountry($id){
        $governorates= $this->locationService->getGovByCountry($id);
        return view('admin.locations.governorates',get_defined_vars());
    }

    public function changeStatus($id)
    {
        $country=$this->locationService->changeStatus($id);
        return response()->json(['status' => 'success', 'message' => 'Status updated successfully', 'data' => $country],200);

    }


    public function changeGoverStatus($id)
    {
        $governorate=$this->locationService->changeGoverStatus($id);
        return response()->json(['status' => 'success', 'message' => 'Status updated successfully', 'data' => $governorate],200);
}

public function shipping(ShippingRequest $request){
    $gov=$this->locationService->shipping($request->gov_id, $request->price);
    return response()->json(['status' => 'success', 'message' => 'Shipping price updated successfully', 'data' => $gov],200);
}

}