<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\Product\CategoryService;
use App\Http\Services\Product\QuizCategoryService;
use Illuminate\Http\Request;

class QuizzCategoryController extends Controller
{
    protected $categoryService;
    protected $quizCategoryService;
    function __construct(CategoryService $categoryService, QuizCategoryService $quizCategoryService)
    {
        $this->quizCategoryService = $quizCategoryService;
        $this->categoryService = $categoryService;
    }
    function index()
    {
        return view('admin.addQuizCategory', [
            'title' => 'Add Quiz Category',
            'listTopic' => $this->categoryService->getTopic()
        ]);
    }
    function store(Request $request)
    {
        $this->quizCategoryService->create($request);
        return redirect()->back();
    }
    function delete($id)
    {
        $this->quizCategoryService->delete($id);
        return redirect()->back();
    }
    function show($id)
    {
        $item = $this->categoryService->get($id);
        return view('admin.listTestQuiz', ['title' => $item->name, 'listItem' => $item]);
    }
    function get($id)
    {
        $item = $this->quizCategoryService->get($id);
        return response()->json($item);
    }
    function getQuestion($id)
    {
        $item = $this->quizCategoryService->get($id);
        return response()->json($item->question);
    }
    function update(Request $request)
    {
        $this->quizCategoryService->update($request);
        return redirect()->back();
    }
}
