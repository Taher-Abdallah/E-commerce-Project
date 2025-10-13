<?php

namespace App\services;

use App\Repositories\BrandRepository;
use Illuminate\Support\Facades\Storage;

class BrandService
{
protected $brandRepository;

public function __construct(BrandRepository $brandRepository)
{
    $this->brandRepository = $brandRepository;
}

public function getBrandsById($id)
{
    return $this->brandRepository->getBrandsById($id);
}
    public function getDataTable()
    {
        return $this->brandRepository->getDataTable();
    }

    public function storeBrand($data)
    {
        if (isset($data['logo'])) {
            $imagePath = Storage::disk('public')->putFile('brands', $data['logo']);
            $data['logo'] = basename($imagePath);
        }

        return $this->brandRepository->storeBrand($data);
    }

    public function updateBrand(array $data, $brand, $request)
    {
        if ($request->hasFile('logo')) {
            if ($brand->logo) {
                Storage::disk('public')->delete('brands/' . $brand->logo);
            }

            $imagePath = Storage::disk('public')->putFile('brands', $request->file('logo'));
            $data['logo'] = basename($imagePath);
        }

        $brand->update($data);

        return $brand;
    }


    public function deleteBrand($id)
    {
        $brand = $this->brandRepository->getBrandsById($id);
        if ($brand->logo) {
            Storage::disk('public')->delete('brands/' . $brand->logo);
        }
        return $this->brandRepository->deleteBrand($brand);
    }
}
