<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Post;
use App\User;

class TopController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index(Request $request){
        // ID取得
        $id = auth()->id();
        // dd($id);
        // ■いろんな合計を出す
        // 今までの合計
        $total = DB::table('posts')->where('user_id', $id)->sum("learning_hour");
        // 月の合計
        $month = DB::table('posts')->where('user_id', $id)->where('learned_date', 'LIKE', '2022-03-%')->sum("learning_hour");
        // その日の合計
        $today = DB::table('posts')->where('user_id', $id)->where('learned_date', 'LIKE', '2022-03-16')->sum("learning_hour");
        // dd($total);
        
        //■月の学習した日を出す(棒グラフを出力する)
        // 日を詰める配列を準備
        $studyDays = [
            ['', '']
        ];
        // 月の学習をごっそり持ってくる(日毎の学習時間をまとめている.また、ソートしてる.)
        $studyDay_month = DB::table('posts')->where('learned_date', 'LIKE', '2022-03-%')
        ->where('user_id', $id)
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
        
        // ■円グラフを出力する
        $studyContents_month = DB::table('posts')->where('learned_date', 'LIKE', '2022-03-%')
        ->where('user_id', $id)
        ->select(DB::raw('sum(learning_hour) as total_learning_hour, learning_content_id'))
        ->groupBy('learning_content_id')
        ->orderBy('learning_content_id')
        ->get();
        // dd($studyContents_month);

        return view('index', compact('total', 'month', 'today', 'studyDays', 'studyDay_month', 'studyContents_month'));
    }
    
    public function admin(Request $request)
    {
        $users = User::all();
        return view('admin', compact('users'));
    }
    
    public function deleteAccount(Request $request, $id)
    {
        $user = new User;
        $user->where('id', $id)->delete();
        return redirect('/admin');
    }

    public function makeAdmin(Request $request, $id)
    {
        Auth::logout();
        $user = new User;
        $user_data = $user->find($id);
        $user_data->is_admin = !$user_data->is_admin;
        $user_data->save();
        // $user_data->update(['is_admin' => 1]);
        return redirect('/admin');
    }
    
    public function post(Request $request){
        $user_id = auth()->id();
        $validatedData = $request->validate([
            'learned_date' => 'required',
            'contents' => 'required',
        ]);
        // dd($request->contents);
        foreach ($request->contents as $index => $content) {
            $post = new Post();
            $post->learned_date = $request->learned_date;
            $post->learning_content_id = $content;
            $post->user_id = $user_id;
            $post->learning_hour = (float)($request->learn_time / count($request->contents));
            $post->save();
        }
        
        // dd("OK");
        return redirect('/top');
    }
    
    public function editName(Request $request){
        $user_id = $request->user_id;
        $user = new User();
        $user = $user->find($user_id);
        $user->name = $request->user_name;
        $user->update();
        return redirect('/admin');
    }
}