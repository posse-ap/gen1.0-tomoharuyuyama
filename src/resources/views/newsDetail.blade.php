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
        <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button> -->

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <span class="navbar-nav mr-auto ">

            </span>
            <button type="button" class="btn btn-lg nav_right_btn mr-3" onclick="location.href='{{ route( 'top' )}}'"
                data-target="#exampleModal">ユーザー画面</button>
        </div>
    </header>
    <main class="main">
      {{-- {{dd($newsDetail)}} --}}

      <div class="wrapper mx-3">
        <img class="h-auto" src="{{$newsDetail["thumbnail_url"]}}" alt="">
        {{-- <div class="d-flex justify-content-between m-3 bg-white align-items-center rounded shadow-sm text-black-50 h-100">
        </div> --}}
        <div class="d-flex justify-content-between m-3 p-5 bg-white align-items-center rounded shadow-sm text-black-50">
          タイトル:{{$newsDetail["title"]}}
        </div>
        <div class="d-flex justify-content-between m-3 p-5 bg-white align-items-center rounded shadow-sm text-black-50">
          本文:{{$newsDetail["text"]}}
        </div>
        <div class="d-flex justify-content-between m-3 p-5 bg-white align-items-center rounded shadow-sm text-black-50">
          作成日:{{$newsDetail["date"]}}
        </div>
        <div class="d-flex justify-content-between m-3 p-5 bg-white align-items-center rounded shadow-sm text-black-50">
          編集者:{{$newsDetail["author"]["name"]}}
        </div>
      </div>
    </main>
</body>

</html>
