<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Middleware\HelloMiddleware;
use App\Http\Requests\HelloRequest;
use Validator;
use Illuminate\Support\Facades\DB;
use App\quiz;
use App\quiz02;
use App\QuizyQuaestion;
use App\QuizyPrefecture;
use App\image;
use App\ImgTestUser;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;


class quizyController extends Controller
{
    public function menu()
    {
        // ログインしていたら
        if (Auth::check()) {
            $prefectures = DB::table('QuizyPrefectures')
            ->get();
            return view('quizy.index', compact('prefectures'));
        } else {
            // ログインしていなかったら、Login画面を表示
            return view('auth/login');
        }
    }
    public function index()
    {
        $prefectures = DB::table('QuizyPrefectures')
            ->get();
        return view('quizy.index', compact('prefectures'));
    }
    public function admin()
    {
        $prefectures = DB::table('QuizyPrefectures')
            ->get();
        return view('quizy.admin', compact('prefectures'));
    }

    public function add(Request $request)
    {

        $post = new QuizyPrefecture();
        $post->name = $request->name;
        $post->save();

        return redirect('quiz/admin');
    }
    public function choice_add(Request $request)
    {
        $post = new quiz();
        $post->prefecture = $request->prefecture_id;
        $post->name = $request->name;
        $post->question_id = $request->question_id;
        $post->valid = $request->valid;
        $post->save();

        return redirect('quiz/admin');
    }
    public function update(Request $request)
    {
        $post = QuizyPrefecture::find($request->id);
        $post->name = $request->name;
        $post->save();

        return redirect('quiz/admin');
    }
    public function choice_update(Request $request)
    {
        $post = quiz::find($request->id);
        $post->name = $request->name;
        $post->QuestionPriority = $request->priority;
        $post->save();

        $post = QuizyQuaestion::where('prefecture_id', $request->prefecture_id)
        ->where('question_id', $request->question_id)
        ->first();
        $post->QuestionPriority = $request->priority;
        $post->save();

        
        $prefectures = DB::table('QuizyPrefectures')
            ->get();
        return view('quizy.admin', compact('prefectures'));
        // return view('quizy.admin');
        // return redirect('quiz/admin');
    }
    public function choice_remove(Request $request)
    {
        $post = quiz::find($request->id);
        $post->delete();
        // return view('quizy.admin', compact('prefectures'));
        return redirect('quiz/admin');
    }
    public function quiz_edit($prefecture_num)
    {
        $prefecture = DB::table('QuizyPrefectures')
            ->find($prefecture_num);
        // dd($prefecture);
        $quiz_choices_box = array();
        for ($i = 0; $i <= 3; $i++) {
            //TODO 選択肢数が3以外でも対応できるようにする
            $value = quiz::where('prefecture', $prefecture_num - 1)
                ->where('question_id', $i)
                ->get();
            array_push($quiz_choices_box, $value);
        }
        $question_name = QuizyQuaestion::where('prefecture_id', $prefecture_num - 1)
            ->get();
        return view('quizy.quiz_edit', compact('prefecture', 'quiz_choices_box', 'value', 'question_name', 'prefecture_num'));
    }

    public function remove(Request $request)
    {
        $post = QuizyPrefecture::find($request->id);
        $post->delete();
        // return view('quizy.admin', compact('prefectures'));
        return redirect('quiz/admin');
    }

    public function quiz($prefecture)
    {
        $user = Auth::user();

        $items = DB::table('quizy')
            ->where('prefecture', $prefecture - 1)
            ->orderBy('QuestionPriority', 'desc')
            ->get();
            $QuizyQuaestion = DB::table('QuizyQuaestionTable')
            ->where('prefecture_id', $prefecture - 1)
            ->get();
            
            // 配列を準備
            $question_list = array();
            $test = array();
            
            
            $img_path = QuizyQuaestion::
            where('prefecture_id', $prefecture)
            ->orderBy('QuestionPriority', 'desc')
            ->get();

            // dd($img_path);


        foreach ($items as $parent_index => $value) {
            $test[$value->question_id][] = $value->name;
        }
        
        array_push($question_list, $test);
        // dd($question_list[0]);

        $dd = array();
        foreach ($question_list[0] as $index => $question) {
            // 回答を保存する
            $answer = $question[0];
            // 選択肢をシャッフル
            shuffle($question_list[0][$index]);
            // 選択肢セットの末尾に回答を追加
            $question_list[0][$index][] = array_search($answer, $question_list[0][$index]);
            // 最末尾に画像パスを追加
            // dd($index);
            $question_list[0][$index][] = $img_path[$index]->imgpath;
        }

        $data = "minnna.png";

        return view('layouts.template', compact('question_list', 'dd', 'prefecture', 'user', 'QuizyQuaestion', 'data', 'img_path'));
    }
    public function imgUpdateTest()
    {
        return view('imgTest');
    }
    public function store(Request $request, $prefecture_num, $question_num)
    {
        //画像のオリジナルネームを取得
        $filename = $request->imgpath->getClientOriginalName();

        //画像を保存して、そのパスを$imgに保存 第三引数に'public'を指定
        $img = $request->imgpath->storeAs('', $filename, 'public');

        //ユーザークラスのインスタンス化
        $user = new QuizyQuaestion();

        $data = $user->updateOrInsert(
                ['prefecture_id' => $prefecture_num, 'question_id' => $question_num],
                ['imgpath' => $filename]
            );

        return redirect('quiz/admin');
    }
}
