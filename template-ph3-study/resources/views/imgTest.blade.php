<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form action="/img_update_test" enctype="multipart/form-data" method="post">
        @csrf
        <input type="file" name="imgpath">
        <input type="submit" value="アップロードする">
    </form>
    <img src=" {{ asset('storage/'.$data->imgpath)}}">
</body>

</html>
