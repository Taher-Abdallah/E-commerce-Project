<?php

namespace App\Services;

use App\Models\Category;
use Yajra\DataTables\DataTables;

class CategoryService
{
 public function getDataTable(){
        $categories = Category::all();
        return DataTables::of($categories)
            ->addIndexColumn()
            ->addColumn('status', function ($category) {
                return $category->translateStatus();
            })
            ->addColumn('action', function ($category) {
                return view('admin.categories.actions.action', compact('category'));
            })->make(true);
 }

}
