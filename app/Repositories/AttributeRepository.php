<?php

namespace App\Repositories;

use App\Models\Attribute;
use Yajra\DataTables\DataTables;

class AttributeRepository
{


    public function getAttribute($id){
        return Attribute::findOrFail($id);
    }

    public function getDataTable()
    {
        $attributes = Attribute::with('attributeValues')->get();
        return DataTables::of($attributes)
            ->addIndexColumn()
            ->addColumn('action', function ($attribute) {
                return view('admin.attributes.datatables.action', compact('attribute'));
            })
            ->addColumn('value', function ($attribute) {
                return view('admin.attributes.datatables.attribute_values', compact('attribute'));
            })
            ->make(true);
    }

    public function storeAttribute($data)
    {
            $attribute = Attribute::create($data);
            return $attribute; 
        // $attribute = Attribute::create($data);
    }

    public function storeAttributeValue($attribute,$value)
    {
        return $attribute->attributeValues()->create($value);
    }
    public function updateAttribute($attribute,$data)
    {
        return $attribute->update($data);
    }


    public function deleteAttributeValue($attribute)
    {
        return $attribute->attributeValues()->delete();
    }
}
