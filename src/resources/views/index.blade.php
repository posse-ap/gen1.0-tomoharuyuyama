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
        <meta name="csrf-token" content="{{ csrf_token() }}">
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
                4th week
            </p>
            <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button> -->
            
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <span class="navbar-nav mr-auto ">
                    
                </span>
                @if ($isAdmin)
                <button type="button" class="btn btn-lg nav_right_btn mr-3" onclick="location.href='{{ route( 'admin' )}}'"
                data-target="#exampleModal">アカウント管理</button>
                <button type="button" class="btn btn-lg nav_right_btn mr-3" onclick="location.href='{{ route( 'admin.contents' )}}'"
                data-target="#exampleModal">コンテンツ管理</button>
                @endif
                <button type="button" class="btn btn-lg nav_right_btn mr-3" onclick="location.href='{{ route( 'news.contents' )}}'"
                data-target="#exampleModal">ニュース</button>
                <form class="form-inline">
                    <!-- <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button> -->
                    <!-- <button type="button" class="btn btn-lg nav_right_btn">記録・投稿</button> -->
                    <!-- Extra large modal -->
                    <!-- <button type="button" class="btn btn-lg nav_right_btn" data-toggle="modal" data-target=".bd-example-modal-lg">記録・投稿</button> -->
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-lg nav_right_btn" data-toggle="modal"
                    data-target="#exampleModal">記録・投稿</button>
                </form>
        </div>
    </header>
    <main class="main">
        {{-- {{dd($islang)}} --}}
        <div class="container my-4">
            <div class="row text-center center">
                <div class="col-md-6">
                    <div class="row md-6 today_cards">
                        <div class="col-4">
                            <div class="today_card bg-white original_rounded_lg">
                                <p class="today_card_top">Today</p>
                                <p class="today_card_midle h3 font-weight-bold">{{ $today }}<span
                                        class="today_card_bottom d-block pt-2">hour</span></p>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="today_card bg-white original_rounded_lg">
                                <p class="today_card_top">Month</p>
                                <p class="today_card_midle h3 font-weight-bold">{{ $month }}<span
                                        class="today_card_bottom d-block pt-2">hour</span></p>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="today_card bg-white original_rounded_lg">
                                <p class="today_card_top">Total</p>
                                <p class="today_card_midle h3 font-weight-bold">{{ $total }}<span
                                        class="today_card_bottom d-block pt-2">hour</span></p>
                            </div>
                        </div>
                    </div>
                    <div class="left_graph">
                        <div>
                            <div class="left_graph_inner bg-white original_rounded_lg allcenter mb-3">
                                <div class="studyTime_barGraph_Box">
                                    <div id="target"></div>
                                </div>
                                <!-- <img src="img/bar_graph.png" alt="棒グラフ" class="bargraph_img bargraph_img_pc">
                                <img src="img/bar_graph_sp.png" alt="棒グラフ" class="bargraph_img bargraph_img_sp"> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-6 mb-3 pr-1">
                            <div class="today_card bg-white circlegrap_card text-left original_rounded_lg">
                                <h2 class="p-3 pt-4 font-weight-bold">言語学習</h2>
                                <div class="img_cace pb-5">
                                    <div class="pieChart_box">
                                    </div>
                                    <div id="pieChart_language"></div>
                                </div>
                                @foreach ($langs as $lang)
                                {{-- @if ($loop->index % 3 == 1) <div class="study_lang container mt-3 d-flex flex-wrap"> @endif --}}
                                <span class="d-inline study_lang_name study_lang_right_margin"><span class="circle" style="background-color: {{ $lang->color }};"></span>{{ $lang->name }}</span>
                                {{-- @if ($loop->index % 3 == 0) </div> @endif --}}
                                @endforeach
                            </div>
                        </div>
                        <div class="col-6 mb-3 pl-1">
                            <div class="today_card bg-white circlegrap_card text-left original_rounded_lg">
                                <h2 class="p-3 pt-4 font-weight-bold">学習コンテンツ</h2>
                                <div class="img_cace pb-5">
                                    <div id="pieChart_contents"></div>
                                    <!-- <img src="./img/pie_chart_2.png" alt="" class="circle_graph"> -->
                                </div>
                                @foreach ($contents as $content)
                                    <div class="study_lang container mt-3 d-flex">
                                        <p class="d-inline study_lang_name study_lang_right_margin flex-wrap"><span
                                                class="circle" style="background-color: {{ $content->color }};"></span>{{ $content->name }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <div>
        <p class="text-center footer_day font-weight-bold"><span class="arrow-left"></span>2020年 10月<span
                class="arrow-right"></span></p>
    </div>
    {{-- {{dd($errors->default)}} --}}
    <button type="button" class="btn btn-lg nav_right_btn sp_button" data-toggle="modal"
        data-target="#exampleModal">記録・投稿</button>

        
    <!-- Modal -->
    <div id="loader-bg">
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal_position modal-dialog-fluid" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    {{-- <form id="form1" action="{{ url("/post") }}" method="post"> --}}
                        <form id="form1">
                            {{-- <input id="contents1" type="checkbox" value="1" name="contents[]">
                            <input id="contents2" type="checkbox" value="2" name="contents[]">
                            <input id="contents3" type="checkbox" value="3" name="contents[]">
                            <input id="language1" type="checkbox" value="1" name="languages[]">
                            <input id="language2" type="checkbox" value="2" name="languages[]">
                            <input id="language3" type="checkbox" value="3" name="languages[]">
                            <input id="language4" type="checkbox" value="4" name="languages[]">
                            <input id="language5" type="checkbox" value="5" name="languages[]">
                            <input id="language6" type="checkbox" value="6" name="languages[]">
                            <input id="language7" type="checkbox" value="7" name="languages[]">
                            <input id="language8" type="checkbox" value="8" name="languages[]"> --}}
                        {{ csrf_field() }}
                        <div class="modal-body modal_position">
                            <div class="container w-80 mr0 p_0">
                                <div id="loading">
                                    <div class="spinner"></div>
                                </div>
                                <div class="row w-100 center data_form">
                                    <div class="col-md-6 p_0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{$error}}</li>
                                            @php
                                                $error_flag = implode(",", $errors->all());
                                                
                                                // dd($error_flag);
                                            @endphp
                                        @endforeach
                                        <div class="modal_top_letf">
                                            <p class="modal_top_letf_text">学習日</p>
                                            <div class="study_day_input bg-light original_rounded_lg_modal">
                                                <!-- <p class="study_day_input original_rounded_lg">2020年10月10日</p> -->
                                                <input class="original_rounded_lg" type="date" name="learned_date">
                                            </div>
                                        </div>
                                        <div>
                                            <span class="modal_top_letf_text">学習コンテンツ（学習コンテンツ）</span>
                                            <div class="study_contens_set mt_5px">
                                                @php
                                                    $counter = 0;
                                                    @endphp
                                                @foreach ($contents as $content)
                                                <label for="name{{ $content->id }}">
                                                        <input type="checkbox" name="contents[]" value="{{ $content->id }}" id="name{{ $content->id }}">
                                                        <p class="d-inline-block original_rounded_lg_modal mb-1 mr-2 p-2 bg_modal_base_color check pl-4 btn_modal">
                                                            <span>{{ $content->name }}</span>
                                                        </p>
                                                    </label>
                                                    @php
                                                        $counter++;
                                                    @endphp
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="mt_15px mb_5px">
                                            <span class="modal_top_letf_text">学習言語（複数選択可）</span>
                                            <div class="study_contens_set mt_5px">
                                                @foreach ($langs as $lang)
                                                    <label for="name{{ $lang->id }}">
                                                        <input type="checkbox" name="lang_contents[]" value="{{ $lang->id }}" id="name{{ $lang->id }}">
                                                        <p class="d-inline-block original_rounded_lg_modal mb-1 mr-2 p-2 bg_modal_base_color check pl-4 btn_modal">
                                                            <span>{{ $lang->name }}</span>
                                                        </p>
                                                    </label>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3 p_0">
                                        <div class="modal_top_right mt_15px mb_5px">
                                            <span class="modal_top_letf_text">学習時間</span>
                                            <div class="bg-light original_rounded_lg_modal mt_5px h_60px">
                                                <input class="h-100" type="tel" name="learn_time" placeholder="整数の入力してください">
                                            </div>
                                        </div>
                                        <div class="mt_15px mb_5px">
                                            <span class="modal_top_letf_text">Twitter用コメント</span>
                                            <div class="study_contens_set mt_5px">
                                                <textarea id="tweetBox" placeholder="ここにツイート内容が出ます" name="tweet_box"
                                                    onkeyup="GetTweet(value)" cols="40" rows="8"
                                                    class="study_hour_input original_rounded_lg original_rounded_lg_modal mb-1 mr-2 p-2 bg_modal_base_color modal_twitter_comment_input"></textarea>
                                                <div class="twitter_post d-flex align-items-center">
                                                    <div class="twitter_post_btn d-inline-block">
                                                        <span class="btn_twitter checkmark002"></span>
                                                    </div>
                                                    <div class="twitter_past_text d-inline-block">
                                                        <p class="d-inline-block original_rounded_lg_modal mb-1 p-2">
                                                            Twitterにシェアする</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="TWEET" class="mx-auto mt-3 btn_spiner">
                                        {{-- <a class="button" type="button" --}}
                                            {{-- href="https://twitter.com/intent/tweet?text=" --}}
                                            {{-- target="_blank"> --}}
                                            <!-- <button id="記録・投稿" type="button" class="btn btn-lg nav_right_btn nav_right_btn_modal" data-toggle="modal" data-target="#exampleModal">記録・投稿</button> -->
                                        {{-- </a> --}}
                                        <div id="button1"
                                        class="btn btn-lg nav_right_btn nav_right_btn_modal"
                                        data-toggle="modal">記録・投稿</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="done modal_loading">
                        <div class="d-flex align-items-center justify-content-center">
                            <div>
                                <div id="loading">
                                    <div class="spinner"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="done modal_node">
                        <div class="d-flex align-items-center justify-content-center">
                            <div>
                                <div class="modal_done_top_text text-center mb-5 pb-5 mt-5 pt-5">AWSOME!</div>
                                <div class="checkedmark003"></div>
                                <div class="mt-5 pt-5 text-center">記録・投稿</div>
                                <div class="mb-5 pb-5">完了しました</div>
                            </div>
                        </div>
                    </div>
                    <div class="done modal_not_node">
                        <div class="d-flex align-items-center justify-content-center">
                            <div>
                                <div class="modal_done_top_text text-center mb-5 pb-5 mt-5 pt-5">ERROR!</div>
                                <div class="checkedmark004"></div>
                                <div class="mt-5 pt-5 text-center">記録・投稿</div>
                                <div class="mb-5 pb-5">エラーが発生しました</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @php
            $contents_sum = count($langs) + count($contents);
            // dd($studyContents_month[0]->total_learning_hour);
            for ($i=0; $i < $contents_sum; $i++) { 
                try {
                    echo '<script>var sum_' . ($i + 1) . ' = ' . $studyContents_month[$i]->total_learning_hour . '</script>';
                } catch (Exception $e) {
                    echo '<script>var sum_' . ($i + 1) . ' = 0</script>';
                }
            }
            echo '<script>var error_flag = ' . $error_flag . '</script>';
            // echo '<script></script>';
        @endphp
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
    integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
    <!-- <script src="./index.js"></script> -->
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <!-- <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
    <script src="https://www.gstatic.com/charts/loader.js"></script>
    <script>
        const spinner = document.getElementById('loading');
        spinner.classList.add('loaded');
        // $('.loaded').css('display', 'none');
        $(function() {
            var h = $(window).height();
    
            // $('#wrap').css('display', 'none');
            // $('#loader-bg ,#loader').height(h).css('display', 'block');
        });
    
        $(window).load(function() { //全ての読み込みが完了したら実行
            // $('#loader-bg').delay(900).fadeOut(800);
            // $('#loader').delay(600).fadeOut(300);
            // $('#wrap').css('display', 'block');
        });
    
        //10秒たったら強制的にロード画面を非表示
        $(function() {
            // setTimeout('stopload()', 10000);
        });
    
        function stopload() {
            // $('#wrap').css('display', 'block');
            // $('#loader-bg').delay(900).fadeOut(800);
            // $('#loader').delay(600).fadeOut(300);
        }
        $(function(){
            $('.nav_right_btn').on('click', function(){
                console.log('！~~~~~~~~~~~~~~~~~~~~');
                var h = $(window).height();
                // $('#wrap').css('display', 'none');
                // $('#loader-bg ,#loader').height(h).css('display', 'block');
                // $('#modalPost').modal('hide');
                // $('#modalLoading').modal('show');
                $('.modal_not_node').css('display', 'none');
                $('.modal_node').css('display', 'none');
                $('.modal-backdrop').css('display', 'block');
                $('#loader-bg').css('display', 'block');
                $('.modal-body').css('display', 'block');
            })
        });
        $(function(){
            $('#button1').on('click', function(){
                console.log('！~~~~~~~~~~~~~~~~~~~~');
                var h = $(window).height();
                // $('#wrap').css('display', 'none');
                // $('#loader-bg ,#loader').height(h).css('display', 'block');
                // $('#modalPost').modal('hide');
                // $('#modalLoading').modal('show');
                $('.modal-body').css('display', 'none');
                $('.modal_loading').css('display', 'block');
                
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    type: 'POST',
                    url: 'http://localhost/post',
                    data: $("#form1").serialize()
                }).done(function(data1,textStatus,jqXHR){
                    // alert('成功！');
                    console.log('成功！');
                    // $('.modal-backdrop').css('display', 'none');
                    console.log(data1);
                    $('.modal_loading').css('display', 'none');
                    $('.modal_node').css('display', 'block');
                    // $('#loader-bg ,#loader').height(h).css('display', 'none');
                    // $('.modal_node').css('display', 'block');
                    // $('#modalLoading').modal('hide');
                    // $('#modalSuccess').modal('show');
                }).fail(function(jqXHR, textStatus, errorThrown ){
                    // alert('成功じゃない！');
                    console.log('成功じゃない！');
                    $('.modal_loading').css('display', 'none');
                    $('.modal_not_node').css('display', 'block');
                    // $('#modalLoading').modal('hide');
                    // $('#modalError').modal('show');
                });
            })
        });
        </script>
        <script>
            var langSet = [
                ['day', 'contents']
            ];
            var contentSet = [
                ['day', 'contents']
            ];
            var contentsChartColor = [];
            var langsChartColor = [];
        </script>
        @php
            foreach ($contents as $content => $index) {
                echo '<script>contentSet.push(["' . $contents[$content]->name . '" , ' . $studyContents_month[$content]->total_learning_hour . '])</script>';
                echo '<script>contentsChartColor.push("' . $contents[$content]->color . '")</script>';
            }
            foreach ($langs as $lang => $index) {
                $num = $studyContents_month->where('learning_content_id', ($lang + 1))[$lang]->total_learning_hour;
                echo '<script>langSet.push(["' . $langs[$lang]->name . '" , ' . $num . '])</script>';
                echo '<script>langsChartColor.push("' . $langs[$lang]->color . '")</script>';
            }
        @endphp
    <script type="text/javascript">
        console.log(contentsChartColor);
        console.log(langsChartColor);
        function create_chart_1() {
            google.load("visualization", "1", {
                packages: ["corechart"]
            });
            google.setOnLoadCallback(
                function() {
                    var array = @json($studyDays);
                    data2 = JSON.stringify(array);
                    data3 = JSON.parse(data2);
                    data = google.visualization.arrayToDataTable(data3);
                    console.log(typeof(data3));
                    console.log(data3);


                    // オプション設定
                    var options = {
                        legend: 'none',
                        'chartArea': {
                            top: 10,
                            'width': '80%',
                            'height': '80%'
                        },
                        vAxis: {
                            gridlines: {
                                color: "#ffffff"
                            },
                            format: "0h"
                        },
                        hAxis: {
                            gridlines: {
                                color: "#ffffff"
                            }
                        },
                        baselineColor: "transparent",

                        colors: ['#1754EF', '#0F71BD', '#20BDDE']

                    };
                    var chart = new google.visualization.ColumnChart(document.getElementById('target'));
                    chart.draw(data, options);
                }
            )
        };

        function create_chart_2() {
            google.load("visualization", "1", {
                packages: ["corechart"]
            });
            google.setOnLoadCallback(drawChart);

            function drawChart() {
                var df = $.Deferred();

                df.resolve();

                df.done(function() {
                    var chartdata_2 = google.visualization.arrayToDataTable(contentSet);
                    console.log(chartdata_2);
                    var options = {
                        legend: 'none',

                        'chartArea': {
                            top: 0,
                            'width': '100%',
                            'height': '100%'
                        },
                        pieHole: 0.5,
                        colors: contentsChartColor,

                    };
                    var chart_2 = new google.visualization.PieChart(document.getElementById('pieChart_contents'));

                    chart_2.draw(chartdata_2, options);
                });
            }
        };

        //言語
        function create_chart_3() {
            google.load("visualization", "1", {
                packages: ["corechart"]
            });
            google.setOnLoadCallback(drawChart);

            function drawChart() {
                var df = $.Deferred();

                df.resolve();
                console.log(typeof(sum_6.name));
                df.done(function() {
                    var chartdata_2 = google.visualization.arrayToDataTable(langSet);
                    var options = {
                        legend: 'none',
                        'chartArea': {
                            top: 0,
                            'width': '100%',
                            'height': '100%'
                        },
                        pieHole: 0.5,
                        colors: langsChartColor,

                    };
                    var chart_2 = new google.visualization.PieChart(document.getElementById('pieChart_language'));

                    chart_2.draw(chartdata_2, options);
                });
            }
        }

        create_chart_1();
        create_chart_2();
        create_chart_3();


        window.onresize = function() {
            create_chart_1();
            create_chart_2();
            create_chart_3();
        }
    </script>
</body>

</html>
