<?php

namespace App\Services;

use App\Models\Category;
use Yajra\DataTables\DataTables;

class CategoryService
{
 public function getDataTable(){
        $categories = Category::withCount('products')->get();
        return DataTables::of($categories)
            ->addIndexColumn()
            ->addColumn('status', function ($category) {
                return $category->translateStatus();
            })
            ->addColumn('icon', function ($category) {
                return view('admin.categories.datatables.icon', compact('category'));
            })
            ->addColumn('action', function ($category) {
                return view('admin.actions.action', compact('category'));
            })->make(true);
 }

}
