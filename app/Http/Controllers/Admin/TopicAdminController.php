<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TopicAdminController extends Controller
{
    function index()
    {
        return view('admin.topic', ['title' => 'Admin topic']);
    }
}
