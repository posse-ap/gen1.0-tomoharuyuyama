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
        <a class="navbar-brand" href="#"><img class="nav_logo" src="img/logo_2.png" alt=""></a>
        <p class="logo_week">
            管理者画面
        </p>
        <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button> -->

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <span class="navbar-nav mr-auto ">

            </span>
            <button type="button" class="btn btn-lg nav_right_btn mr-3" onclick="location.href='{{ route( 'admin' )}}'"
                data-target="#exampleModal">ユーザー画面</button>
        </div>
    </header>
    <main class="main">
        {{-- {{dd($users)}} --}}
        @foreach ($users as $user)
            <div class="wrapper mx-3">
                <div class="d-flex justify-content-between m-3 bg-white align-items-center rounded shadow-sm">
                    <div class="info p-1 ml-3">{{ $user->name }}</div>
                    <div class="actions">
                        <button class="action p-2 m-2 border-0 bg-danger text-white rounded shadow-sm" onclick="location.href='{{ route( 'delete' , ['id' => $user->id])}}'">削除</button>
                        <button class="action p-2 m-2 border-0 bg-primary text-white rounded shadow-sm" onclick="location.href='{{ route( 'make.admin' , ['id' => $user->id])}}'">管理者</button>
                    </div>
                </div>
            </div>
        @endforeach
    </main>
</body>

</html>
