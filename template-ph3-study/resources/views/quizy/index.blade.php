<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <ul>
        @foreach ($prefectures as $prefecture)
            <li>
                <a href="./quiz/{{ $prefecture->id }}">{{ $prefecture->name }}</a>
            </li>
        @endforeach
            <li>
                <a href="./quiz/admin">管理者画面</a>
            </li>
    </ul>
</body>

</html>
