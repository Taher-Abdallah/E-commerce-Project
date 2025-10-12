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
            // حذف القديم لو موجود
            if ($model->$fieldName) {
                self::delete($folder, $model->$fieldName);
            }

            // رفع الجديد
            $newFile = self::upload($request, $fieldName, $folder);

            // تحديث الموديل
            $model->$fieldName = $newFile;
        }
    }
}
