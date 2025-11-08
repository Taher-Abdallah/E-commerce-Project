<?php

namespace App\Utils;

use Illuminate\Support\Facades\Storage;

class UploadHelper
{
    /**
     * رفع ملف جديد
     */
    public static function upload($request, $fieldName, $folder)
    {
        if ($request->hasFile($fieldName)) {
            $path = Storage::disk('public')->putFile($folder, $request->file($fieldName));
            return basename($path);
        }

        return null;
    }

    public static function uploadMultiple($request, $fieldName, $folder)
    {
        $fileNames = [];

        if ($request->hasFile($fieldName)) {
            foreach ($request->file($fieldName) as $file) {
                $path = Storage::disk('public')->putFile($folder, $file);
                $fileNames[] = basename($path);
            }
        }

        return $fileNames;
    }



    /**
     * حذف ملف موجود
     */
    public static function delete($folder, $fileName)
    {
        if ($fileName && Storage::disk('public')->exists("$folder/$fileName")) {
            Storage::disk('public')->delete("$folder/$fileName");
        }
    }

    /**
     * تحديث ملف (يحذف القديم ويرفع الجديد)
     */
    public static function update($model, $request, $fieldName, $folder)
    {
        if ($request->hasFile($fieldName)) {
            $oldFile = $model->getRawOriginal($fieldName);
            if ($oldFile) {
                self::delete($folder, $oldFile);
            }

            $file = $request->file($fieldName);
            $newName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs($folder, $newName, 'public');

            return $newName; // ✅ نرجّع الاسم الجديد
        }

        return $model->getRawOriginal($fieldName);
    }
}
