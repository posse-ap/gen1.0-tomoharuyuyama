<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Middleware\HelloMiddleware;

global $head, $style, $body, $end;


class HelloController extends Controller
{

    public function index(Request $request)
    {
        return view('hello.index');
    }
}