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
    
    public function quizy1() {
        $items = DB::table('quizy')
        ->where('prefecture', 0)
        ->get();
        $question_list = array();
        $test = array();

        foreach ($items as $parent_index => $value) {
            // $dd = $value;
            $test[$parent_index][] = $value->name;
            // foreach ($value as $index => $value) {
            // }
        }
        
        array_push($question_list, $test);
        // array_push($question_list, ['たかなわ', 'こうわ', 'たかわ']);
        // array_push($question_list, ['かめいど', 'かめと', 'かめど']);
        // array_push($question_list, ['こうじまち', 'おかとまち', 'かゆまち']);

            // $dd = array();
            foreach($question_list as $index => $question){
                // 回答を保存
                $answer = $question[0];
                // 選択肢をシャッフル
                shuffle($question_list[$index]);
                // 選択肢セットの末尾に回答を追加
                $question_list[$index][] = array_search($answer, $question_list[$index]);
            }
            
            $dd = $items;
        return view('quizy.quizy1', compact('question_list', 'dd'));

        // return view('quizy.quizy1');
    }

    public function quizy2() {
        return view('quizy.quizy2');
    }
}