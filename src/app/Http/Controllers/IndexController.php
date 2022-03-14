<?php

namespace App\Http\Controllers;

use App\BigQuestion;

class IndexController extends Controller
{
    public function index()
    {
        $big_questions = BigQuestion::all();
        return view('index', compact('big_questions'));
    }
    public function code()
    {
        $big_questions = BigQuestion::all();
        return view('code', compact('big_questions'));
    }
}
