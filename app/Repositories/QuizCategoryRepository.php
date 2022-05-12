<?php

namespace App\Repositories;

use App\Models\QuizCategory;


class QuizCategoryRepository
{
    protected $quizCategory;
    function __construct(QuizCategory $quizCategory)
    {
        $this->quizCategory = $quizCategory;
    }
    function create($attribute)
    {
        return $this->quizCategory->create($attribute);
    }
    function delete($id)
    {
        $item = $this->quizCategory->find($id);
        if ($item) {
            return $item->delete();
        }
        return false;
    }
    function get($id)
    {
        return $this->quizCategory->find($id);
    }
    function update($attributes, $id)
    {
        return $this->quizCategory->where('id', $id)->update($attributes);
    }
}
