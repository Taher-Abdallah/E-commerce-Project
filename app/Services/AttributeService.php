<?php

namespace App\Services;

use Dom\Attr;
use Exception;
use App\Models\Attribute;
use Illuminate\Support\Facades\DB;
use App\Repositories\AttributeRepository;

class AttributeService
{

    protected $attributeRepository;
    public function __construct(AttributeRepository $attributeRepository)
    {
        $this->attributeRepository = $attributeRepository;
    }

    public function getAttribute($id){
        return $this->attributeRepository->getAttribute($id);
    }

    public function getDataTable()
    {
        return $this->attributeRepository->getDataTable();
    }

    public function storeData($data)
    {
        try {
            DB::beginTransaction();

            $attribute = $this->attributeRepository->storeAttribute(['name' => $data['name']]);

            foreach ($data['value'] as $value) {
                $this->attributeRepository->storeAttributeValue($attribute, ['value' => $value]);
            }

            DB::commit();
            return true;

            return to_route('admin.attributes.index')->with('success', 'Attribute and values created successfully.');
        } catch (Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }   
     }

     public function updateData($attribute,$data)
     {
        try {
            DB::beginTransaction();

            $this->attributeRepository->updateAttribute($attribute, ['name' => $data['name']]);

            $this->attributeRepository->deleteAttributeValue($attribute);

            foreach ($data['value'] as $value) {
                $this->attributeRepository->storeAttributeValue($attribute, ['value' => $value]);
            }

            DB::commit();
            return true;

            return to_route('admin.attributes.index')->with('success', 'Attribute and values updated successfully.');
        } catch (Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }   
     }
}
