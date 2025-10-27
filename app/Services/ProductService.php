<?php

namespace App\Services;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Utils\UploadHelper;
use App\Repositories\ProductRepository;
use Illuminate\Support\Facades\Storage;

class ProductService
{

    protected $productRepository;
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function getDataTable(){
        return $this->productRepository->getDataTable();
    }

    public function storeProductImage($request, $product){
        if ($request->hasFile('images')) {
            $uploadedFiles = $this->productRepository->storeProductImage($request);

            foreach ($uploadedFiles as $fileName) {
                $product->productImages()->create([
                    'file_name' => $fileName,
                    'file_size' => Storage::disk('public')->size('products/' . $fileName),
                    'file_type' => pathinfo($fileName, PATHINFO_EXTENSION),
                ]);
            }

        }

    }

    public function storeVariant($request, $product){
        if ($request->has_variants == 1 && $request->has('variants')) {
            foreach ($request->variants as $variantData) {
                // إنشاء الـ Product Variant
                $productVariant = $product->productVariants()->create([
                    'price' => $variantData['price'],
                    'stock' => $variantData['stock'],
                ]);

                // ربط الـ Attributes (Color & Size) بالـ Variant
                if (!empty($variantData['color'])) {
                    $productVariant->variantAttributes()->create([
                        'attribute_value_id' => $variantData['color'],
                    ]);
                }

                if (!empty($variantData['size'])) {
                    $productVariant->variantAttributes()->create([
                        'attribute_value_id' => $variantData['size'],
                    ]);
                }
            }
        }
    }


    public function updateVariants($request, $product){
        // لو لا يوجد Variants
        if ($request->has_variants == 0) {
            $product->productVariants()->delete(); 
            $product->update([
                'price' => $request->price, 
            ]);
        }

        // لو Variants موجودة
        if ($request->has_variants == 1 && $request->has('variants')) {

            $variantIds = [];

            foreach ($request->variants as $variantData) {

                if (isset($variantData['id'])) {
                    // تحديث الـ Variant القديم
                    $variant = $product->productVariants()->find($variantData['id']);

                    if ($variant) {
                        $variant->update([
                            'price' => $variantData['price'],
                            'stock' => $variantData['stock'],
                        ]);

                        // حذف الـ attributes القديمة
                        $variant->variantAttributes()->delete();
                    }
                } else {
                    // إنشاء Variant جديد
                    $variant = $product->productVariants()->create([
                        'price' => $variantData['price'],
                        'stock' => $variantData['stock'],
                    ]);
                }

                $variantIds[] = $variant->id;

                // إضافة الـ attributes
                if (!empty($variantData['color'])) {
                    $variant->variantAttributes()->create([
                        'attribute_value_id' => $variantData['color'],
                    ]);
                }

                if (!empty($variantData['size'])) {
                    $variant->variantAttributes()->create([
                        'attribute_value_id' => $variantData['size'],
                    ]);
                }
            }

            // حذف الـ Variants اللي اتشالت من الفورم
            $product->productVariants()
                ->whereNotIn('id', $variantIds)
                ->delete();
        }
    }

    public function destroyProductImages($product){
        if ($product->productImages) {
            foreach ($product->productImages as $image) {
                Storage::disk('public')->delete('products/' . $image->file_name);
                $image->delete();
            }
        }
    }

}
