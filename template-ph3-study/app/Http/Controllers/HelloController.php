<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;


global $head, $style, $body, $end;
$head = '<html></html>';
$style = <<<EOF
<style>
body {
    font-size: 16px;;
    color:#999;
}
h1 {
    text-align: right;
    color: #eee;
    margin: -40px 0px -50px 0px;
    font-size: 100px;
}
</style>
EOF;

class HelloController extends Controller
{
    // public function index(Request $request){
    //     $data = [
    //         'msg'=>'これはコントローラから渡されたメッセージです。',
    //         'id'=>$request->id
    //     ];
    //     return view('hello.index', $data);
    // }
    public function index()
    {
        return view('hello.index');
    }
}