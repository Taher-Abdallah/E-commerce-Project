<?php

namespace App\Http\Controllers\Admin;

use Attribute;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Utils\UploadHelper;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Models\AttributeValue;
use App\Models\ProductVariant;
use App\Services\ProductService;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Repositories\ProductRepository;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    protected $productService,$productRepository;
    public function __construct(ProductService $productService , ProductRepository $productRepository){
        $this->productService = $productService;
        $this->productRepository = $productRepository;
    }
    public function getDataTable()
    {
        return $this->productService->getDataTable();
    }
    public function index()
    {
        return view('admin.products.index');
    }

    public function create()
    {

        $brands = $this->productRepository->getBrands();
        $categories = $this->productRepository->getCategories();
        $sizes = $this->productRepository->getAttributeValue(1);
        $colors = $this->productRepository->getAttributeValue(2);
        return view('admin.products.create', get_defined_vars());
    }


    public function store(ProductRequest $request)
    {
        $data = $request->validated();
        $product = $this->productRepository->storeProduct($data);

        // 3️⃣ رفع وحفظ الصور
        $images=$this->productService->storeProductImage($request,$product);

        // 4️⃣ حفظ الـ Variants لو موجودة
        $variants=$this->productService->storeVariant($request,$product);

        return redirect()->route('admin.products.index')->with('success', 'Product created successfully.');
    }
    public function edit(string $id)
    {
        $product = Product::with(['productImages', 'productVariants.variantAttributes.attributeValue.attribute'])->findOrFail($id);
        $sizes = $this->productRepository->getAttributeValue(1);
        $colors = $this->productRepository->getAttributeValue(2);
        $brands = $this->productRepository->getBrands();
        $categories = $this->productRepository->getCategories();
        return view('admin.products.edit', get_defined_vars());
    }

    public function update(ProductRequest $request, string $id)
    {
        $product = $this->productRepository->getProductId($id);
        $data = $request->validated();
        $productUpdate=$this->productRepository->updateProduct($product, $data);
        // $product->load('productImages'); 
        $images=$this->productService->storeProductImage($request, $product);
        $variants=$this->productService->updateVariants($request, $product);
        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
    }
            
    public function destroy(string $id)
    {
        $products = $this->productRepository->getProductWith($id);
        $destroy = $this->productService->destroyProductImages($products);
        $products->delete();
        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully');
    }

    public function deleteImage($id)
    {
        $image = $this->productRepository->getImageId($id);
        Storage::disk('public')->delete('products/' . $image->file_name);
        $image->delete();

        return response()->json(['success' => true]);
    }
}
