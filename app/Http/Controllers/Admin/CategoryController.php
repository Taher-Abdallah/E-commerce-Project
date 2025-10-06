<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Services\CategoryService;

class CategoryController extends Controller
{
    protected $categoryService;
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        return view('admin.categories.index');
    }

    public function getDataTable(){
        return $this->categoryService->getDataTable();
    }


    public function create()
    {
        $categories = Category::select('id', 'name')->get();
        return view('admin.categories.create', compact('categories'));
    }


    public function store(CategoryRequest $request)
    {
        Category::create($request->validated());
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
        $category = Category::find($id);
        $category->update($request->validated());
        return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully');
    }

    public function destroy(string $id)
    {
       Category::find($id)->delete();
        return redirect()->route('admin.categories.index')->with('success', 'Category deleted successfully');
    }
}
