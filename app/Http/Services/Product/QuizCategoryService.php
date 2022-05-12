<?php

namespace App\Http\Services\Product;

use App\Repositories\QuizCategoryRepository;
use Illuminate\Support\Facades\Session;

class QuizCategoryService
{
    protected $quizCategoryRepository;
    function __construct(QuizCategoryRepository $quizCategoryRepository)
    {
        $this->quizCategoryRepository = $quizCategoryRepository;
    }
    function create($request)
    {
        try {
            $this->quizCategoryRepository->create([
                'cat_id' => $request->get('category'),
                'name' => $request->get('quizCategoryName'),
                'description' => $request->get('description')
            ]);
            Session::flash('success', 'Add category success!');
        } catch (\Exception $error) {
            Session::flash('error', $error->getMessage());
            return false;
        }
    }
    function delete($id)
    {
        try {
            $this->quizCategoryRepository->delete($id);
            Session::flash('success', 'Delete category success!');
        } catch (\Exception $error) {
            Session::flash('error', $error->getMessage());
            return false;
        }
    }
    function get($id)
    {
        try {
            return  $this->quizCategoryRepository->get($id);
        } catch (\Exception $error) {
            return false;
        }
    }
    function update($request)
    {
        try {
            $this->quizCategoryRepository->update([
                'name' => $request->get('quizCategoryName'),
                'description' => $request->get('description')
            ], $request->get('id'));
            Session::flash('success', 'Update quiz category success!');
        } catch (\Exception $error) {
            Session::flash('error', $error->getMessage());
            return false;
        }
    }
}
