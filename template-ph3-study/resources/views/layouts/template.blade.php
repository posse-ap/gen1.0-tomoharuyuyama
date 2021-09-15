<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>quizy3</title>
    <link href="https://storage.googleapis.com/google-code-archive-downloads/v2/code.google.com/html5resetcss/html5reset-1.6.css">
    <link rel="stylesheet" href="../css/quizy1.css">
    {{-- <link rel="stylesheet" href="../css/quizy3.css"> --}}
</head>

<body>
    @if (Auth::check())
        <p>USER: {{$user->name . ' (' . $user->email . ')'}}</p>
    @else
        <p>※ログインしていません(<a href='/login'>ログイン</a><a href='/register'>登録</a>)</p>
    @endif
    {{-- {{$prefectures->name}}へようこそ --}}
    <div class="main">
        @foreach ($question_list[0] as $question)
        <div class="quiz">
            <h1>{{$loop->index+1}}. この地名はなんて読む？</h1>
            <br>
            @if ($prefecture == 2 || $prefecture == 1)
                <img src="../img/{{$prefecture}}/{{$loop->index+1}}.png">
            @else
                <p>{{$QuizyQuaestion[$loop->index]->question_title}}</p>
            @endif
            <ul>
                @foreach ($question as $item)
                @if ($loop->last)
                {{-- ループ終了 --}}
                @break
                @endif
                <li id="answerlist_{{$loop->parent->index+1}}_{{$loop->index+1}}" name="answerlist_{{$loop->parent->index+1}}" class="answerlist" onclick="check({{$loop->parent->index+1}}, {{$loop->index+1}}, {{$question[3]+1}})">{{$item}}</li>
                @endforeach
                <li id="answerbox_{{$loop->index+1}}" class="answerbox">
                    <span id="answertext_{{$loop->index+1}}"></span><br>
                    <span>正解は「{{$question[end($question)]}}」です！</span>
                </li>
            </ul>
        </div>
        {{-- {{dd($question)}} --}}
        @endforeach
        <div id="main" class="main">
            <script src="../js/quizy3.js"></script>
        </div>
    </body>
    
    </html>