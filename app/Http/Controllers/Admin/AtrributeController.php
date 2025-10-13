<?php

namespace App\Http\Controllers\Admin;

use Dom\Attr;
use Exception;
use App\Models\Attribute;
use Illuminate\Http\Request;
use App\Models\AttributeValue;
use Yajra\DataTables\DataTables;
use App\Services\AttributeService;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\AttributeRequest;
use App\Repositories\AttributeRepository;

class AtrributeController extends Controller
{

    protected $attributeService,$attributeRepository;

    public function __construct(AttributeService $attributeService,AttributeRepository $attributeRepository)
    {
        $this->attributeService = $attributeService;
        $this->attributeRepository = $attributeRepository;
    }

    public function getDataTable(){
     return $this->attributeService->getDataTable();

    }

    public function index()
    {
        return view('admin.attributes.index');
    }

    public function create()
    {
        return view('admin.attributes.create');
    }

    public function store(AttributeRequest $request)
    {
        $data= $request->validated();
        $this->attributeService->storeData($data);
        return to_route('admin.attributes.index')->with('success', 'Attribute and values created successfully.');
    }



    public function edit(string $id)
    {
        $attribute=$this->attributeService->getAttribute($id);
        return view('admin.attributes.edit',compact('attribute'));
    }

    public function update(AttributeRequest $request, string $id)
    {
        $attribute=$this->attributeService->getAttribute($id);
        $data= $request->validated();
        $this->attributeService->updateData($attribute,$data);
        return to_route('admin.attributes.index')->with('success', 'Attribute and values updated successfully.');
    }


    public function destroy(string $id)
    {
        $attribute=$this->attributeService->getAttribute($id);
        $attribute->delete();
        return redirect()->route('admin.attributes.index')->with('success', 'Attribute deleted successfully');
    }
}
