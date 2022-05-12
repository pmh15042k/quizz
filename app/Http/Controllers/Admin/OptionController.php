<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\Product\OptionService;
use Illuminate\Http\Request;

class OptionController extends Controller
{
    protected $optionSerivce;
    function __construct(OptionService $optionSerivce)
    {
        $this->optionSerivce = $optionSerivce;
    }
    function store(Request $request)
    {
        $option = $this->optionSerivce->store($request);
        return response()->json($option);
    }
    function getByQuestion($id)
    {
        $options = $this->optionSerivce->getByQuestion($id);
        return response()->json($options);
    }
}
