<?php

namespace App\Http\Services\Product;

use App\Repositories\OptionRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class OptionService
{
    protected $optionRepository;
    function __construct(OptionRepository $optionRepository)
    {
        $this->optionRepository = $optionRepository;
    }
    function store($request)
    {
        try {
            return  $this->optionRepository->create([
                'question_id' => $request->get('idQuestion'),
                'value' => $request->get('option'),
                'iscorrect' =>  $request->get('isCorrect')
            ]);
        } catch (\Exception $error) {
            return ['error' => $error->getMessage()];
        }
    }
    function getByQuestion($id)
    {
        try {
            return  $this->optionRepository->getByQuestion($id);
                
        } catch (\Exception $error) {
            return ['error' => $error->getMessage()];
        }
    }
}
