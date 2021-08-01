<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Middleware\HelloMiddleware;
use App\Http\Requests\HelloRequest;
use Validator;
use Illuminate\Support\Facades\DB;


class quizyController extends Controller
{
    public function index() {
        return view('quizy.index');
    }
    
    public function quizy1() {
        $items = DB::table('quizy')
        ->where('prefecture', 1)
        ->get();
    return view('quizy.quizy1', ['items' => $items]);

        // return view('quizy.quizy1');
    }

    public function quizy2() {
        return view('quizy.quizy2');
    }
}