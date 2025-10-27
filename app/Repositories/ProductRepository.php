<?php

namespace App\Repositories;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Utils\UploadHelper;
use App\Models\ProductImage;
use App\Models\AttributeValue;
use Yajra\DataTables\DataTables;

class ProductRepository
{

    public function getProductWith($id)
    {
        return Product::with(['productImages', 'productVariants'])->findOrFail($id);
    }
    public function getDataTable()
    {
        $products = Product::latest()->get();
        return DataTables::of($products)
            ->addIndexColumn()
            ->addColumn('status', function ($product) {
                return $product->status == 1 ? 'Active' : 'Inactive';
            })
            ->addColumn('brand_id', function ($product) {
                return $product->brand->name;
            })
            ->addColumn('category_id', function ($product) {
                return $product->category->name;
            })
            ->addColumn('price', function ($product) {
                return $product->price == null ? 'Has Variants' : $product->price . ' ' . 'EGP';
            })
            ->addColumn('quantity', function ($product) {
                return $product->quantity == null ? "Doesn't have manage stock" : $product->quantity;
            })
            ->addColumn('created_at', function ($product) {
                return $product->created_at->diffForHumans();
            })
            // ->addColumn('images', function ($product) {
            // })
            ->addColumn('has_variants', function ($product) {
                return $product->has_variants == 1 ? 'Has Variants' : 'No';
            })

            ->addColumn('action', function ($product) {
                return view('admin.products.datatables.action', compact('product'))->render();
            })
            ->make(true);
    }

    public function getImageId($id){
        return ProductImage::findOrFail($id);
    }

    public function getProductId($id)
    {
        return Product::findOrFail($id);
    }

    public function getBrands()
    {
        return Brand::all();
    }

    public function getCategories()
    {
        return Category::all();
    }

    public function getAttributeValue($attribute_id)
    {
        return AttributeValue::where('attribute_id', $attribute_id)->get();
    }

    // store product only without variants & images
    public function storeProduct($data)
    {
        return Product::create(collect($data)->except(['images', 'variants'])->toArray());
    }

    public function storeProductImage($request)
    {
        return  UploadHelper::uploadMultiple($request, 'images', 'products');
    }

    public function updateProduct($product, $data)
    {
        return $product->update(collect($data)->except(['images', 'variants', 'deleted_images'])->toArray());
    }
}
