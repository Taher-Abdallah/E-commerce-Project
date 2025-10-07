<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Requests\BrandRequest;
use App\Http\Controllers\Controller;
use App\services\BrandService;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    protected $brandService;

    public function __construct(BrandService $brandService)
    {
        $this->brandService = $brandService;
    }
    public function getDataTable() {
        return $this->brandService->getDataTable();
    }
    public function index()
    {
        return view('admin.brands.index');
    }


    public function create()
    {
        return view('admin.brands.create');
    }


    public function store(BrandRequest $request)
    {
            $this->brandService->storeBrand($request->validated());
            return redirect()->route('admin.brands.index')->with('success', 'Brand created successfully');
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $brand= $this->brandService->getBrandsById($id);
        return view('admin.brands.edit',compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BrandRequest $request, string $id)
    {
        $brand = $this->brandService->getBrandsById($id);
         $this->brandService->updateBrand($request->validated(),$brand,$request);
        return redirect()->route('admin.brands.index')->with('success', 'Brand updated successfully');
    }


    public function destroy(string $id)
    {
        $this->brandService->deleteBrand($id);
        return redirect()->route('admin.brands.index')->with('success', 'Brand deleted successfully');
    }
}
