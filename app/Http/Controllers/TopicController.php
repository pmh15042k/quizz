<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TopicController extends Controller
{
    function index()
    {
        return view('topic', ['title' => 'Topic']);
    }
}
