<?php

namespace App\Repositories;

use App\Models\Brand;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;

class BrandRepository
{
    public function getBrandsById($id)
    {
        return Brand::findOrfail($id);
    }
    public function getDataTable()
    {
        $brands = Brand::withCount('products')->get();
        return DataTables::of($brands)
            ->addIndexColumn()
            ->addColumn('status', function ($brand) {
                return $brand->translateStatus();
            })
            ->addColumn('logo', function ($brand) {
                return view('admin.brands.datatables.logo', compact('brand'));
            })
            ->addColumn('action', function ($brand) {
                return view('admin.brands.datatables.action', compact('brand'));
            })
            ->addColumn('products_count', function ($brand) {
                return $brand->products_count == 0 ? 'Not Found' : $brand->products_count;
            })
            ->rawColumns(['logo'])
            ->make(true);   
         }

         public function storeBrand($data)
         {
        return Brand::create($data);
         }



         public function deleteBrand($brand){
            return $brand->delete();
         }
}
