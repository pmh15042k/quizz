<?php

namespace App\Repositories;

use App\Models\question;


class QuestionRepository
{
    protected $question;
    function __construct(question $question)
    {
        $this->question = $question;
    }
    function create($attributes)
    {
        return $this->question->create($attributes);
    }
    function delete($id)
    {
        $item = $this->question->find($id);
        if ($item) {
            return $item->delete();
        }
        return false;
    }
    function getQuestionByQuiz($id)
    {
        return $this->question->where('quizcategory_id', $id)->with('options')->get();
    }
}
