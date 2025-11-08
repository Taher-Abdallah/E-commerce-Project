<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use App\Utils\UploadHelper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;
use App\Repositories\SliderRepository;
use App\Services\SliderService;

class SliderController extends Controller
{
    public $sliderRepository,$sliderService;
    public function __construct(SliderRepository $sliderRepository , SliderService $sliderService)
    {
        $this->sliderRepository = $sliderRepository;
        $this->sliderService = $sliderService;
    }
    

    public function getDataTable()
    {
        return $this->sliderRepository->getDataTable();  
    }
    public function index()
    {
        return view('admin.sliders.index');
    }

    public function create()
    {
        return view('admin.sliders.create');
    }

    public function store(SliderRequest $request)
    {
        $this->sliderService->store($request);
        return redirect()->route('admin.sliders.index')->with('success', 'Slider created successfully');
    }


    public function edit(string $id)
    {
        $slider = $this->sliderRepository->find($id);
        return view('admin.sliders.edit', compact('slider'));
    }

    public function update(SliderRequest $request, string $id)
    {
        $this->sliderService->update($id, $request);
        return redirect()->route('admin.sliders.index')->with('success', 'Slider updated successfully');
    }

    public function destroy(string $id)
    {
        $this->sliderService->destroy($id);
        return redirect()->route('admin.sliders.index')->with('success', 'Slider deleted successfully');
    }
}
