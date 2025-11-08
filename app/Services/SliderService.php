<?php

namespace App\Services;

use App\Models\Slider;
use App\Utils\UploadHelper;
use App\Repositories\SliderRepository;

class SliderService
{
    /**
     * Create a new class instance.
     */
    public $sliderRepository;
    public function __construct(SliderRepository $sliderRepository)
    {
        $this->sliderRepository = $sliderRepository;
    }

    public function store($request)
    {
        $data = $request->validated();
        if ($request->hasFile('file_name')) {
            $data['file_name'] = UploadHelper::upload($request, 'file_name', 'sliders');
        }
        return $this->sliderRepository->create($data);
    }

    public function update($id, $request)
    {
        $slider = $this->sliderRepository->find($id);
        $data = $request->validated();

        if ($request->hasFile('file_name')) {
            $data['file_name'] = UploadHelper::update($slider, $request, 'file_name', 'sliders');
        }

        return $this->sliderRepository->update($slider, $data);
    }

    public function destroy($id)
    {
        $slider = $this->sliderRepository->find($id);
        UploadHelper::delete('sliders/', $slider->getRawOriginal('file_name'));
        return $this->sliderRepository->delete($slider);
    }
}
