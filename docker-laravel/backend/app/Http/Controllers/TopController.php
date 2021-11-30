<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TopController extends Controller
{
    public function index(){
        // 今までの合計
        $total = DB::table('posts')->sum("learning_hour");
        // 月の合計
        $month = DB::table('posts')->where('learned_date', 'LIKE', '2020-10-%')->sum("learning_hour");
        // その日の合計
        $today = DB::table('posts')->where('learned_date', 'LIKE', '2020-10-01')->sum("learning_hour");
        // dd($post);
        return view('index', compact('total', 'month', 'today'));
        // return view('top.index', conpact(''));
    }
}
