<?php

namespace App\Repositories;

use App\Models\catTopic;


class CategoryRepository
{
    protected $catTopic;
    function __construct(catTopic $catTopic)
    {
        $this->catTopic = $catTopic;
    }
    function create($attributes)
    {
        return $this->catTopic->create($attributes);
    }
    function getTopic()
    {
        return $this->catTopic->where('parent_id', 0)->get();
    }
    function getAll()
    {
        return $this->catTopic->get();
    }
    function getChildrenTopic($id)
    {
        return $this->catTopic->where('parent_id', $id)->get();
    }
    function update($attributes, $id)
    {
        return $this->catTopic->where('id', $id)->update($attributes);
    }
    function delete($id)
    {
        $item = $this->catTopic->find($id);
        if ($item) {
            return $item->delete();
        }
        return false;
    }
    function get($id)
    {
        return $this->catTopic->find($id);
    }
}
