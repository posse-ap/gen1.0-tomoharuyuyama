<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <a href="/quiz/admin">戻る</a>
    <h1>編集：{{ $prefecture->name }}</h1>
    <h1>更新</h1>
    @foreach ($quiz_choices_box as $quiz_choices)
        {{-- <h2>{{dd($quiz_choice->question_id)}}</h2> --}}
        
        <ul>
            @foreach ($quiz_choices as $quiz_choice)
                @php
                    $conter = $quiz_choice->question_id;
                @endphp
                {{-- {{dd($quiz_choices)}}<br> --}}
                <form method="post" action="{{ url('/choice/update') }}">
                    {{ csrf_field() }}
                    {{-- <li>問題：{{ $question_name[$conter]->question_title }}</li> --}}
                    <li>問題：</li>
                    <li>大門ID：{{ $quiz_choice->question_id }}</li>
                    <input type='hidden' name='id' value='{{ $quiz_choice->id }}'>
                    <input type='hidden' name='prefecture_id' value='{{ $prefecture->id }}'>
                    <input type='hidden' name='question_id' value='{{ $quiz_choice->question_id }}'>
                    <input type='text' name='name' value='{{ $quiz_choice->name }}'>
                    @if ($loop->first)
                    <br>
                    <span>問題優先度 : </span>
                    <input type='text' name='priority' value='{{ $quiz_choice->QuestionPriority }}'>
                    @endif
                    <input type='submit' value='更新'>
                </form>
                <form action="/img_update_test/{{ $prefecture_num }}/{{ $quiz_choice->question_id }}"
                    enctype="multipart/form-data" method="post">
                    {{ csrf_field() }}
                    <input type="file" name="imgpath">
                    <input type="submit" value="アップロードする">
                </form>
            @endforeach
        </ul>
    @endforeach
    <h1>追加</h1>
    <form method="post" action="{{ url('/choice/add') }}">
        {{ csrf_field() }}
        <input type='hidden' name='prefecture_id' value='{{ $prefecture->id - 1 }}'>
        <input type='text' name='question_id' placeholder="大門ID 数字のみ">
        <input type='text' name='name' placeholder="選択肢名">
        <input type='radio' name='valid' value='0' checked>不正解
        <input type='radio' name='valid' value='1'>正解
        <input type='submit' value='更新'>
    </form>
    <h1>削除</h1>
    @foreach ($quiz_choices_box as $quiz_choices)
        {{-- {{dd($quiz_choices)}}<br> --}}
        {{-- <h2>{{dd($quiz_choice->question_id)}}</h2> --}}
        <ul>
            @foreach ($quiz_choices as $quiz_choice)
                <form method="post" action="{{ url('/choice/remove') }}">
                    {{ csrf_field() }}
                    <input type='hidden' name='id' value='{{ $quiz_choice->id }}'>
                    {{-- <input type='text' name='name' value='{{ $quiz_choice->name }}'> --}}
                    <span>{{ $quiz_choice->name }}</span>
                    <input type='submit' value='削除'>
                </form>
            @endforeach
        </ul>
    @endforeach

</body>

</html>
