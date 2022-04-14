<!doctype html>
<html lang="ja">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <title>Webアプリ制作</title>
</head>

<body>
    <!-- loding -->
    <div id="overlay">
        <div class="cv-spinner">
            <span class="spinner"></span>
        </div>
    </div>
    <header class="navbar navbar-expand-lg navbar-light bg-white">
        <a class="navbar-brand" href="#"><img class="nav_logo" src="{{ asset('img/logo.png') }}" alt=""></a>
        <p class="logo_week">
            管理者画面
        </p>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <span class="navbar-nav mr-auto ">

            </span>
            <button type="button" class="btn btn-lg nav_right_btn mr-3" onclick="location.href='{{ route( 'top' )}}'"
                data-target="#exampleModal">ユーザー画面</button>
        </div>
    </header>
    <main class="main">
        <div class="wrapper mx-3">
            <div class="m-3 bg-info align-items-center rounded shadow-sm text-white">
                {{-- <div class="info p-1 ml-3">{{ $content->name }}</div> --}}
                <div class="p-2">学習コンテンツを追加する</div>
                <form action="{{ route( 'add.content')}}" method="post" class="d-flex justify-content-between">
                    @csrf
                    {{-- <input type="submit" class="action p-2 m-2 border-0 bg-danger text-white rounded shadow-sm" value="追加"> --}}
                    <input class="info p-3 text-white w-25" type="text" placeholder="名称を入力" name="new_content_name">
                    <div class="w-25 d-block">
                        <div class="">
                            <input class="w-auto" type="radio" name="is_lang" value="1" checked>言語
                        </div>
                        <div class="">
                            <input class="w-auto" type="radio" name="is_lang" value="0">コンテンツ
                        </div>
                    </div>
                    {{-- <input class="info p-3 text-white w-50" type="color" name="new_content_color"  autocomplete="on"> --}}
                    <div class="w-25 d-block">
                        <div>
                            <label for="new_content_color">color</label>
                        </div>
                        <div>
                            <input type="color" id="new_content_color" name="new_content_color" value="#e66465">
                        </div>
                    </div>
                </form>
                {{-- <div class="actions">
                    <button class="action p-2 m-2 border-0 bg-danger text-white rounded shadow-sm" onclick="location.href='aaaa'">削除</button>
                </div> --}}
            </div>
        </div>
        {{-- {{dd($users)}} --}}
        @foreach ($contents as $content)
            <div class="wrapper mx-3">
                <div class="d-flex justify-content-between m-3 bg-white align-items-center rounded shadow-sm">
                    {{-- <div class="info p-1 ml-3">{{ $content->name }}</div> --}}
                    <form action="{{ route( 'edit.content_name')}}" method="post">
                        @csrf
                        <input type="hidden" name="content_id" value="{{ $content->id }}">
                        <input class="info p-1 ml-3" type="text" value="{{ $content->name }}" name="content_name">
                    </form>
                    <div class="actions">
                        <button class="action p-2 m-2 border-0 bg-danger text-white rounded shadow-sm" onclick="location.href='{{ route( 'content_delete' , ['id' => $content->id])}}'">削除</button>
                    </div>
                </div>
            </div>
        @endforeach

    </main>
</body>

</html>
