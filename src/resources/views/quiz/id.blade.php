<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>quizy</title>
    <link
        href="https://storage.googleapis.com/google-code-archive-downloads/v2/code.google.com/html5resetcss/html5reset-1.6.css">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
</head>

<body>
    <div class="main">
        {{-- 東京バージョンではここを2周する --}}
        {{-- 一周目は高輪 --}}
        {{-- 二周目は亀戸 --}}
        @foreach($questions as $question)
            <div class="quiz">
                {{-- 問題番号を挿入している。機械数字なのでプラス1する --}}
                <h1>{{ $loop -> index + 1 }}. この地名はなんて読む？</h1>
                {{-- 画像のパスを挿入している --}}
                <img src="/img/{{ $question->image }}">
                <ul>
                    {{-- 選択肢の出力をする --}}
                    {{-- question_idで絞り込む --}}
                    {{-- $questionsは既に$big_question_idで絞り込まれているので、一周目では二周目の選択肢は表示されない --}}
                    @foreach ($choices->where('question_id', $question->id) as $choice)
                        <li 
                            id="answerlist_{{ $question->id }}_{{ $loop->index + 1 }}"
                            name="answerlist_{{ $question->id }}"
                            class="answerlist"
                            onclick="check(
                                {{ $question->id }},
                                {{ $loop->index + 1 }},
                                mysql> select * from choices;
                                // 高輪の場合
                                // $choices->where('question_id', $question->id)->where('valid', true)->first()->id - (($question->id - 1) * 3)
                                // $choices == すべての選択肢(東京クイズ、広島クイズなどすべての選択肢)
                                // $choices->where('question_id', $question->id) == 高輪に関する選択肢のレコード集
                                // $choices->where('question_id', $question->id)->where('valid', true) == 高輪に関する正解の選択肢のレコード
                                // $choices->where('question_id', $question->id)->where('valid', true)->first()->id == 高輪に関する正解の選択肢のレコードのid(数値)  中身は「1」
                                // (亀戸の場合は「6」)
                                // (($question->id - 1) * 3) ==> (1-1) * 3 ==> 0
                                // 亀戸の場合。。。  (2-1) * 3 ==> 3
                                // $choices->where('question_id', $question->id)->where('valid', true)->first()->id - (($question->id - 1) * 3)  ==> 1 - 0 ==> 1
                                // 亀戸の場合。。。  6 - 3 ==> 3
                                // 答えのレコードid - 問題番号を3倍にしたやつ
                                {{ $choices->where('question_id', $question->id)->where('valid', true)->first()->id - (($question->id - 1) * 3) }}
                            )"
                        >{{ $choice->name }}</li>
                    @endforeach
                    <li id="answerbox_{{ $question->id }}" class="answerbox">
                        <span id="answertext_{{ $question->id }}"></span><br>
                        <span>
                            正解は「
                            {{ $choices->where('question_id', $question->id)->where('valid', true)->first()->name }}
                            」です！
                        </span>
                    </li>
                </ul>
            </div>
        @endforeach
        {{-- JSファイルと接続  sample-ph3-quizy/src/public/js/main.js --}}
        <script src="{{ asset('/js/main.js') }}"></script>
    </div>
</body>

</html>