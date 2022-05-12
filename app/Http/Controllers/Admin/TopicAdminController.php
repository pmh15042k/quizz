<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\Product\CategoryService;
use App\Http\Services\Upload\UploadService;
use Illuminate\Http\Request;

class TopicAdminController extends Controller
{
    protected $categoryService;
    protected $uploadService;
    function __construct(CategoryService $categoryService, UploadService $uploadService)
    {
        $this->categoryService = $categoryService;
        $this->uploadService = $uploadService;
    }
    function index()
    {
        return view('admin.topic', ['title' => 'Admin topic', 'listTopic' => $this->categoryService->getAll()]);
    }
    function createCategory()
    {
        return view('admin.addCategory', ['title' => 'Add Category Quizz', 'listTopic' => $this->categoryService->getTopic()]);
    }
    function createTopic(Request $request)
    {
        $this->categoryService->createTopic($request);
        return redirect()->back();
    }
    function storeCategory(Request $request)
    {
        if ($request->hasFile('file')) {
            $img =  $this->uploadService->storeThumbCategory($request);
        }
        $this->categoryService->storeCategory($request, $img);
        return redirect()->back();
    }
    function getChildrenTopic($id)
    {
        return response()->json($this->categoryService->getChildrenTopic($id));
    }
    function update(Request $request)
    {
        $this->categoryService->update($request);
        return redirect()->back();
    }
    function delete($id)
    {
        $this->categoryService->delete($id);
        return redirect()->back();
    }
}
