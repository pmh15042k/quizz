<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\Product\QuestionService;
use App\Http\Services\Product\QuizCategoryService;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    protected $quizCategoryService;
    protected $questionService;
    function __construct(QuizCategoryService $quizCategoryService, QuestionService $questionService)
    {
        $this->quizCategoryService = $quizCategoryService;
        $this->questionService = $questionService;
    }
    function create($id)
    {
        return view('admin.addQuestion', ['title' => 'Add question', 'cat' => $this->quizCategoryService->get($id)]);
    }
    function store(Request $request)
    {
        $question = $this->questionService->store($request);
        return response()->json($question);
    }
    function delete($id)
    {
        $this->questionService->delete($id);
        return redirect()->back();
    }
    function getQuestionByQuiz($id)
    {
        $item = $this->questionService->getQuestionByQuiz($id);
    
        return response()->json($item)  ;
    }
}
