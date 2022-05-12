<?php

namespace App\Repositories;

use App\Models\option;


class OptionRepository
{
    protected $option;
    function __construct(option $option)
    {
        $this->option = $option;
    }
    function create($attributes)
    {
        return $this->option->create($attributes);
    }
    function getByQuestion($id)
    {
        return $this->option->where('question_id', $id)->get();
    }
}
