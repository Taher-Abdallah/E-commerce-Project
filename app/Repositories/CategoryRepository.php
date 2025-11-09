<?php

namespace App\Repositories;

use App\Models\Category;
use Yajra\DataTables\DataTables;

class CategoryRepository
{
    public function getDataTable()
    {
        $categories = Category::withCount('products')->get();
        return DataTables::of($categories)
            ->addColumn('status', function ($category) {
                return $category->translateStatus();
            })
            ->addIndexColumn()
            ->addColumn('icon', function ($category) {
                return view('admin.categories.datatables.icon', compact('category'));
            })
            ->addColumn('action', function ($category) {
                return view('admin.categories.actions.action', compact('category'));
            })->make(true);
    }

    public function find($id)
    {
        return Category::find($id);
    }

    public function store($data)
    {
        return Category::create($data);
    }

    public function update($category, $data)
    {
        return $category->update($data);
    }

    public function destroy($category){
        $category->delete();
    }
}
