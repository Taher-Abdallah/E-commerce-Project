<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Repositories\CategoryRepository;
use App\Services\CategoryService;
use App\Utils\UploadHelper;

class CategoryController extends Controller
{
    protected $categoryService,$categoryRepository;
    public function __construct(CategoryService $categoryService , CategoryRepository $categoryRepository)
    {
        $this->categoryService = $categoryService;
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        return view('admin.categories.index');
    }

    public function getDataTable(){
        return $this->categoryRepository->getDataTable();
    }


    public function create()
    {
        $categories = Category::select('id', 'name')->get();
        return view('admin.categories.create', compact('categories'));
    }


    public function store(CategoryRequest $request)
    {
        $this->categoryService->storeCategory($request);
        return redirect()->route('admin.categories.index')->with('success', 'Category created successfully');
    }


    public function edit(string $id)
    {
        $category = Category::find($id);
        $categories = Category::where('id', '!=', $id)->WhereNull('parent')->get();
        return view('admin.categories.edit', compact('category', 'categories'));
    }


    public function update(CategoryRequest $request, string $id)
    {

        $this->categoryService->updateCategory($request, $id);
        return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully');
    }

    public function destroy(string $id)
    {
        $this->categoryService->deleteCategory($id);
        return redirect()->route('admin.categories.index')->with('success', 'Category deleted successfully');
    }
}
