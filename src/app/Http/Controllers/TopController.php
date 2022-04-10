<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Post;
use App\User;
use App\Content;
use Symfony\Component\Mime\Encoder\ContentEncoderInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use \Symfony\Component\HttpFoundation\Response;

class TopController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index(Request $request){
        $error_flag = 0;
        $content = Content::all();
        $user = User::all();
        $langs = $content
        ->where('is_show', 1)
        ->where('is_lang', '1');
        $contents = $content
        ->where('is_show', 1)
        ->where('is_lang', '0');
        // ID取得
        $id = auth()->id();
        // 管理者かどうか取得
        $isAdmin = $user->find($id)->is_admin;
        // ■いろんな合計を出す
        // 今までの合計
        $total = DB::table('posts')
        ->join('contents', 'posts.learning_content_id', '=', 'contents.id')
        ->where('contents.is_lang', 0)
        ->where('user_id', $id)
        ->whereOr('user_id', 0)
        ->sum("learning_hour");
        // 月の合計
        $month = DB::table('posts')
        ->join('contents', 'posts.learning_content_id', '=', 'contents.id')
        ->where('contents.is_lang', 0)
        ->where('user_id', $id)
        ->where('learned_date', 'LIKE', '2022-04-%')
        ->sum("learning_hour");
        // その日の合計
        $today = DB::table('posts')
        ->join('contents', 'posts.learning_content_id', '=', 'contents.id')
        ->where('contents.is_lang', 0)
        ->where('user_id', $id)
        ->where('learned_date', 'LIKE', '2022-04-05')
        ->sum("learning_hour");
        // dd($total);
        
        //■月の学習した日を出す(棒グラフを出力する)
        // 日を詰める配列を準備
        $studyDays = [
            ['', '']
        ];
        // 月の学習をごっそり持ってくる(日毎の学習時間をまとめている.また、ソートしてる.)
        $studyDay_month = DB::table('posts')->where('learned_date', 'LIKE', '2022-04-%')
        ->where('user_id', $id)
        ->orWhere('user_id', 0)
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
        $studyContents_month = DB::table('posts')->where('learned_date', 'LIKE', '2022-04-%')
        ->where('user_id', $id)
        ->orWhere('user_id', 0)
        ->select(DB::raw('sum(learning_hour) as total_learning_hour, learning_content_id'))
        ->groupBy('learning_content_id')
        ->orderBy('learning_content_id')
        ->get();
        // dd($studyContents_month);
        return view('index', compact('total', 'month', 'today', 'studyDays', 'studyDay_month', 'studyContents_month', 'contents', 'langs', 'isAdmin', 'error_flag'));
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
    
    public function deleteContent(Request $request, $id)
    {
        $content = new Content;
        // $content->where('id', $id)->delete();
        $content = $content->find($id);

        $content->is_show = 0;

        $content->update();
        return redirect('/admin/contents/edit');
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
        // $validatedData = $request->validate([
        //     'learned_date' => 'required',
        //     'contents' => 'required',
        // ]);
        foreach ($request->contents as $index => $content) {
            $post = new Post();
            $post->learned_date = $request->learned_date;
            $post->learning_content_id = $content;
            $post->user_id = $user_id;
            $post->learning_hour = (float)($request->learn_time / count($request->contents));
            $post->save();
        }
        foreach ($request->lang_contents as $index => $content) {
            $post = new Post();
            $post->learned_date = $request->learned_date;
            $post->learning_content_id = $content;
            $post->user_id = $user_id;
            $post->learning_hour = (float)($request->learn_time / count($request->lang_contents));
            $post->save();
        }
        
        // dd("OK");
        // return redirect('/top');
    }
    
    public function editName(Request $request){
        $user_id = $request->user_id;
        $user = new User();
        $user = $user->find($user_id);
        $user->name = $request->user_name;
        $user->update();
        return redirect('/admin');
    }
    
    public function editContentName(Request $request){
        $contents = new Content();
        $content = $contents->find($request->content_id);
        $content->name = $request->content_name;
        $content->update();
        return redirect('/admin/contents/edit');
    }

    public function editContent(Request $request){
        $contents = new Content();
        $contents = $contents->where('is_show', 1)->get();
        return view('edit_content', compact('contents'));
    }

    public function news(Request $request){
        $url = 'https://bkrs3waxwg.execute-api.ap-northeast-1.amazonaws.com/default/news';
        $client = new \GuzzleHttp\Client();

        $response = $client->request(
            'GET',
            $url,
        );
        
        $raw_data = $response->getBody()->getContents();
        $news = json_decode($raw_data,true);

        return view('news', compact('news'));
    }

    public function newsDetail(Request $request, $id){
        $url = 'https://bkrs3waxwg.execute-api.ap-northeast-1.amazonaws.com/default/news/' . $id;
        $client = new \GuzzleHttp\Client();

        $response = $client->request(
            'GET',
            $url,
        );
        
        $raw_data = $response->getBody()->getContents();
        $newsDetail = json_decode($raw_data,true);

        return view('newsDetail', compact('newsDetail'));
    }

    public function logout(){
        Auth::logout();
        return redirect('/login');
    }

    public function addContent(Request $request){
        // dd($request);
        $content = new Content();
        $content->is_lang = $request->is_lang;
        $content->color = $request->new_content_color;
        $content->name = $request->new_content_name;
        $content->save();
        
        // $user = User::all();
        // dd($user);
        
        $post = new Post();
        $post->learned_date = date('Y-m-d H:i:s');
        $post->learning_content_id = $content->id;
        $post->user_id = 0;
        $post->learning_hour = 0;
        $post->save();


        return redirect('/admin/contents/edit');
    }
}