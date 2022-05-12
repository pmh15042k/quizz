<?php

namespace App\Http\Services\Product;

use App\Repositories\CategoryRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CategoryService
{
    protected $categoryRepository;
    function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }
    function createTopic($request)
    {
        try {
            $this->categoryRepository->create(
                [
                    'name' => $request->get('nameTopic'),
                    'user_id' => Auth::user()->id,
                ]
            );
            Session::flash('success', 'Add topic success!');
        } catch (\Exception $error) {
            Session::flash('error', $error->getMessage());
            return false;
        }
    }
    function getTopic()
    {
        return $this->categoryRepository->getTopic();
    }
    function getAll()
    {
        return $this->categoryRepository->getAll();
    }
    function getChildrenTopic($id)
    {
        return $this->categoryRepository->getChildrenTopic($id);
    }
    function storeCategory($request, $img)
    {
        try {
            $this->categoryRepository->create([
                'name' => $request->get('categoryName'),
                'parent_id' => $request->get('topic'),
                'description' => $request->get('description'),
                'user_id' => Auth::user()->id,
                'thumb' => $img
            ]);
            Session::flash('success', 'Add category success!');
        } catch (\Exception $error) {
            Session::flash('error', $error->getMessage());
            return false;
        }
    }
    function update($request)
    {
        try {
            $this->categoryRepository->update([
                'name' => $request->get('nameTopic'),
            ], $request->get('idTopic'));
            Session::flash('success', 'Edit topic success!');
        } catch (\Exception $error) {
            Session::flash('error', $error->getMessage());
            return false;
        }
    }
    function delete($id)
    {
        try {
            $this->categoryRepository->delete($id);
            Session::flash('success', 'Delete category success!');
        } catch (\Exception $error) {
            Session::flash('error', $error->getMessage());
            return false;
        }
    }
    function get($id)
    {
        try {
            return  $this->categoryRepository->get($id);
        } catch (\Exception $error) {
            return false;
        }
    }
}
