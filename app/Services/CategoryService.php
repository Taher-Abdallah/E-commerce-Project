<?php

namespace App\Services;

use App\Models\Category;
use App\Utils\UploadHelper;
use Yajra\DataTables\DataTables;
use App\Repositories\CategoryRepository;

class CategoryService
{
    public $categoryRepository;
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }
    public function storeCategory($request)
    {
        $data = $request->validated();
        $data['icon'] = UploadHelper::upload($request, 'icon', 'categories');
        return $this->categoryRepository->store($data);
    }

    public function updateCategory($request, $id)
    {
        $data = $request->validated();
        $category = $this->categoryRepository->find($id);
        if ($request->hasFile('icon')) {
            $data['icon'] = UploadHelper::update($category, $request, 'icon', 'categories');
        }
        return $this->categoryRepository->update($category,$data);
    }

    public function deleteCategory($id){
        $category = $this->categoryRepository->find($id);
        UploadHelper::delete('categories/', $category->icon);
        $this->categoryRepository->destroy($category);
    }
}
