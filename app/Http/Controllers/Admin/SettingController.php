<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SettingRequest;
use App\Utils\UploadHelper;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{

    public function show(string $id)
    {
        // $setting = Setting::findOrFail($id);
        return view('admin.settings.index');
    }


    public function update(SettingRequest $request, string $id)
    {
        $setting = Setting::findOrFail($id);
        $data=$request->validated();
        $data['logo'] = UploadHelper::update($setting, $request, 'logo', 'settings/logo');
        $data['favicon'] = UploadHelper::update($setting, $request, 'favicon', 'settings/favicon');
        $setting->update($data);
        return redirect()->back()->with('success', 'Setting updated successfully');
    }


}
