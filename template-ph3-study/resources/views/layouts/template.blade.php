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
    {{dd($dd)}}
    @yield('title')へようこそ
    <div class="main">
        @foreach ($question_list as $question)
        <div class="quiz">
            <h1>{{$loop->index+1}}. この地名はなんて読む？</h1>
            <img src="../img/{{$loop->index+1}}.png">
            <ul>
                @foreach ($question as $item)
                @if ($loop->last)
                    {{-- ループ終了 --}}
                    @break
                @endif
                <li id="answerlist_{{$loop->parent->index+1}}_{{$loop->index+1}}" name="answerlist_{{$loop->parent->index+1}}" class="answerlist" onclick="check({{$loop->parent->index+1}}, {{$loop->index+1}}, {{end($question)+1}})">{{$item}}</li>
                @endforeach
                <li id="answerbox_{{$loop->index+1}}" class="answerbox">
                    <span id="answertext_{{$loop->index+1}}"></span><br>
                    <span>正解は「{{$question[end($question)]}}」です！</span>
                </li>
            </ul>
        </div>
        @endforeach
        <div id="main" class="main">
            <script src="../js/quizy3.js"></script>
        </div>
    </body>
    
    </html>
    