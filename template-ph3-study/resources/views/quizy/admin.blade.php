<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <!-- css をあてる際は以下のようにcssを読み込む-->
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    <a href="/quiz">戻る</a>
    <h1>削除</h1>
    <ul>
        @foreach ($prefectures as $prefecture)
            {{-- {{ $arasuka }} --}}
            <form method="post" action="{{ url('/remove') }}">
                {{ csrf_field() }}
                <li>
                    <input type='hidden' name='id' value='{{ $prefecture->id }}'>
                    <a href="./quiz/{{ $loop->iteration }}">{{ $prefecture->name }}</a>
                    <input type='submit' value='削除'>
                </li>
            </form>
        @endforeach
        {{-- {{ dd($prefectures) }} --}}
    </ul>
    <h1>更新</h1>
    <ul>
        @foreach ($prefectures as $prefecture)
            {{-- {{ $arasuka }} --}}
            <form method="post" action="{{ url('/update') }}">
                {{ csrf_field() }}
                <li>
                    <input type='text' name='name' value='{{ $prefecture->name }}'>
                    <input type='hidden' name='id' value='{{ $prefecture->id }}'>
                    <input type='submit' value='更新'>
                </li>
            </form>
        @endforeach

        {{-- {{ dd($prefectures) }} --}}
    </ul>
    <h1>追加</h1>
    <form method="post" action="{{ url('/add') }}">
        {{ csrf_field() }}
        <p>
            <input type="text" name="name" placeholder="enter name">
        </p>
        {{-- <p>
        <textarea name="body" placeholder="enter body"></textarea>
        </p> --}}
        <p>
            <input type="submit" value="Add">
        </p>
    </form>
    <h1>問題の編集</h1>
    <ul>
        @foreach ($prefectures as $prefecture)
            {{-- {{ $arasuka }} --}}
            <form method="post" action="{{ url('/update') }}">
                {{ csrf_field() }}
                <li>
                    <a href="/quiz/edit/{{ $loop->iteration }}">{{ $prefecture->name }}</a>
                </li>
            </form>
        @endforeach

        {{-- {{ dd($prefectures) }} --}}
    </ul>
    <form action="/img_update_test/yuyama" enctype="multipart/form-data" method="post">
        @csrf
        <input type="file" name="imgpath">
        <input type="submit" value="アップロードする">
    </form>
</body>
