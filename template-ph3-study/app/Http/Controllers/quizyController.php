<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Middleware\HelloMiddleware;
use App\Http\Requests\HelloRequest;
use Validator;
use Illuminate\Support\Facades\DB;
use App\quiz;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Collection;


class quizyController extends Controller
{
    public function index() {
        return view('quizy.index');
    }
    public function quiz($prefecture) {
        
                // データを取得
                $items = DB::table('quizy')
                ->where('prefecture', $prefecture)
                ->get();
        
                // 配列を準備
                $question_list = array();
                $test = array();
        
                
                foreach ($items as $parent_index => $value) {
                        $test[$value->question_id][] = $value->name;
                }
                
                array_push($question_list, $test);
        
                    $dd = array();
                    foreach($question_list[0] as $index => $question){
                        // 回答を保存
                        $answer = $question[0];
                        // 選択肢をシャッフル
                        shuffle($question_list[0][$index]);
                        // 選択肢セットの末尾に回答を追加
                        $question_list[0][$index][] = array_search($answer, $question_list[0][$index]);
                        $dd[] = $index;
                    }
                    
                return view('quizy.quizy1', compact('question_list', 'dd', 'prefecture'));

    }
    public function quizy1() {
        // $ybrr = app()->make('App\Http\Controllers\quizyController');
        return $this->quiz(0);

    }

    public function quizy2() {
        return $this->quiz(1);
    }
}