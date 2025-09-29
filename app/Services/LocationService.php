<?php

namespace App\Services;

use App\Repositories\LocationRepository;

class LocationService
{
    /**
     * Create a new class instance.
     */
    protected $locationRepository;
    public function __construct(LocationRepository $locationRepository)
    {
        $this->locationRepository = $locationRepository;
    }

    public function getCountries(){
        return $this->locationRepository->getCountries();
    }

    public function getGovByCountry($id){
        return $this->locationRepository->getGovByCountry($id);
    }

    public function getCountryById($id){
        return $this->locationRepository->getCountryById($id);
    }

    public function getGovernorate($id){
        return $this->locationRepository->getGovernorate($id);
    }

    public function changeStatus($id){
        return $this->locationRepository->changeStatus($id);
    }

    public function changeGoverStatus($id){
        return $this->locationRepository->changeGoverStatus($id);
    }

    public function shipping($id, $price){
        return $this->locationRepository->shipping($id, $price);
    }
}
