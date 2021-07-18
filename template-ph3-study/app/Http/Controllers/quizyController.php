<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class quizyController extends Controller
{
    public function index() {
        return view('quizy.index');
    }
    public function quizy1() {
        return view('quizy.quizy1');
    }
    public function quizy2() {
        return view('quizy.quizy2');
    }
}