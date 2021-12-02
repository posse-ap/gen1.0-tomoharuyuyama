<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TopController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index(){
        // ■いろんな合計を出す
        // 今までの合計
        $total = DB::table('posts')->sum("learning_hour");
        // 月の合計
        $month = DB::table('posts')->where('learned_date', 'LIKE', '2020-10-%')->sum("learning_hour");
        // その日の合計
        $today = DB::table('posts')->where('learned_date', 'LIKE', '2020-10-01')->sum("learning_hour");
        
        //■月の学習した日を出す(棒グラフを出力する)
        // 日を詰める配列を準備
        $studyDays = [
            ['', '']
        ];
        // 月の学習をごっそり持ってくる(日毎の学習時間をまとめている.また、ソートしてる.)
        $studyDay_month = DB::table('posts')->where('learned_date', 'LIKE', '2020-10-%')
        ->select(DB::raw('sum(learning_hour) as total_learning_hour, learned_date'))
        ->groupBy('learned_date')
        ->orderBy('learned_date')
        ->get();
        foreach ($studyDay_month as $index => $studyDay) {
            $day_cut = $studyDay->learned_date;
            // 日ごとの学習日を抜き出している
            $day_cutde = substr($day_cut, 8, 2);
            
            $learning_hour = $studyDay->total_learning_hour;
    
            $tmp = [];
            array_push($tmp, (int)$day_cutde);
            array_push($tmp, $learning_hour);
            array_push($studyDays, $tmp);
        }
        array_push($studyDays, [32, 0]);
        // dd($studyDays);
        
        // ■円グラフを出力する
        $studyContents_month = DB::table('posts')->where('learned_date', 'LIKE', '2020-10-%')
        ->select(DB::raw('sum(learning_hour) as total_learning_hour, learning_content_id'))
        ->groupBy('learning_content_id')
        ->orderBy('learning_content_id')
        ->get();
        // dd($studyContents_month);

        return view('index', compact('total', 'month', 'today', 'studyDays', 'studyDay_month', 'studyContents_month'));
    }
}