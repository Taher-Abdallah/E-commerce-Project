<?php

namespace App\Repositories;

use App\Models\Slider;

class SliderRepository
{
public function getDataTable()
    {
        $sliders = Slider::all();
        return datatables()->of($sliders)
        ->addIndexColumn()
        ->addColumn('action', function($slider){
            return view('admin.sliders.datatables.action', compact('slider'));
        })
        ->addColumn('file_name', function($slider){
            return view('admin.sliders.datatables.image', compact('slider'));
        })
            ->make(true);   
    }

    public function create(array $data)
    {
        return Slider::create($data);
    }

    public function update($slider, array $data)
    {
        $slider->update($data);
        return $slider;
    }

    public function delete($slider)
    {
        return $slider->delete();
    }

    public function find($id)
    {
        return Slider::findOrFail($id);
    }
}
