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
    {{-- <div id="target"></div> --}}
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
                                    <!-- <img src="./img/pie_chart_1.png" alt="" class="circle_graph"> -->
                                </div>
                                <div class="study_lang container mt-3 d-flex flex-wrap">
                                    <span class="d-inline study_lang_name study_lang_right_margin"><span
                                            class="circle js_color"></span>JavaScript</span>
                                    <span class="d-inline study_lang_name study_lang_right_margin"><span
                                            class="circle css_color"></span>CSS</span>
                                    <span class="d-inline study_lang_name study_lang_right_margin"><span
                                            class="circle php_color"></span>PHP</span>
                                </div>
                                <div class="study_lang container pt-0 d-flex flex-wrap">
                                    <span class="d-inline study_lang_name study_lang_right_margin"><span
                                            class="circle html_color"></span>HTML</span>
                                    <span class="d-inline study_lang_name study_lang_right_margin"><span
                                            class="circle laravel_color"></span>Laravel</span>
                                    <span class="d-inline study_lang_name"><span
                                            class="circle sql_color"></span>SQL</span>
                                </div>
                                <div class="study_lang container pt-0 d-flex flex-wrap">
                                    <span class="d-inline study_lang_name"><span
                                            class="circle shell_color"></span>SHELL</span>
                                </div>
                                <div class="study_lang container pt-0 d-flex flex-wrap pb-4">
                                    <span class="d-inline study_lang_name study_lang_name_ohter"><span
                                            class="circle other_color"></span>情報システム基礎知識(その他)</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 mb-3 pl-1">
                            <div class="today_card bg-white circlegrap_card text-left original_rounded_lg">
                                <h2 class="p-3 pt-4 font-weight-bold">学習コンテンツ</h2>
                                <div class="img_cace pb-5">
                                    <div id="pieChart_contents"></div>
                                    <!-- <img src="./img/pie_chart_2.png" alt="" class="circle_graph"> -->
                                </div>
                                <div class="study_lang container mt-3 d-flex">
                                    <p class="d-inline study_lang_name study_lang_right_margin flex-wrap"><span
                                            class="circle dotinstall_color"></span>ドットインストール</p>
                                </div>
                                <div class="study_lang container pt-0 d-flex">
                                    <p class="d-inline study_lang_name flex-wrap"><span
                                            class="circle nyobi_color"></span>N予備校</p>
                                </div>
                                <div class="study_lang container pt-0 d-flex pb-4">
                                    <p class="d-inline study_lang_name flex-wrap"><span
                                            class="circle posse_color"></span>POSSE課題</p>
                                </div>
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
                    <div class="modal-body modal_position">
                        <div class="container w-80 mr0 p_0">
                            <div class="row w-100 center">
                                <div class="col-md-6 p_0">
                                    <div class="modal_top_letf">
                                        <p class="modal_top_letf_text">学習日</p>
                                        <div class="study_day_input bg-light original_rounded_lg_modal">
                                            <!-- <p class="study_day_input original_rounded_lg">2020年10月10日</p> -->
                                            <input class="original_rounded_lg" type="date">
                                        </div>
                                    </div>
                                    <div>
                                        <span class="modal_top_letf_text">学習コンテンツ（学習コンテンツ）</span>
                                        <div class="study_contens_set mt_5px">
                                            <p
                                                class="d-inline-block original_rounded_lg_modal mb-1 mr-2 p-2 bg_modal_base_color check pl-4 btn_modal">
                                                N予備校</p>
                                            <p
                                                class="d-inline-block original_rounded_lg_modal mb-1 p-2 bg_modal_base_color check pl-4 btn_modal">
                                                ドットインストール</p><br>
                                            <p
                                                class="d-inline-block original_rounded_lg_modal mb-1 p-2 bg_modal_base_color check pl-4 btn_modal">
                                                POSSE課題</p>
                                        </div>
                                    </div>
                                    <div class="mt_15px mb_5px">
                                        <span class="modal_top_letf_text">学習言語（複数選択可）</span>
                                        <div class="study_contens_set mt_5px">
                                            <p
                                                class="d-inline-block original_rounded_lg_modal mb-1 mr-2 p-2 bg_modal_base_color check pl-4 btn_modal">
                                                HTML</p>
                                            <p
                                                class="d-inline-block original_rounded_lg_modal mb-1 mr-2 p-2 bg_modal_base_color check pl-4 btn_modal">
                                                CSS</p>
                                            <p
                                                class="d-inline-block original_rounded_lg_modal mb-1 p-2 bg_modal_base_color check pl-4 btn_modal">
                                                JavaScript</p><br>
                                            <p
                                                class="d-inline-block original_rounded_lg_modal mb-1 mr-2 p-2 bg_modal_base_color check pl-4 btn_modal">
                                                PHP</p>
                                            <p
                                                class="d-inline-block original_rounded_lg_modal mb-1 mr-2 p-2 bg_modal_base_color check pl-4 btn_modal">
                                                Laravel</p>
                                            <p
                                                class="d-inline-block original_rounded_lg_modal mb-1 mr-2 p-2 bg_modal_base_color check pl-4 btn_modal">
                                                SQL</p>
                                            <p
                                                class="d-inline-block original_rounded_lg_modal mb-1 p-2 bg_modal_base_color check pl-4 btn_modal">
                                                SHELL</p><br>
                                            <p
                                                class="d-inline-block original_rounded_lg_modal mb-1 p-2 bg_modal_base_color check pl-4 btn_modal">
                                                情報システム基礎知識（その他）</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3 p_0">
                                    <div class="modal_top_right mt_15px mb_5px">
                                        <span class="modal_top_letf_text">学習時間</span>
                                        <div class="bg-light original_rounded_lg_modal mt_5px h_60px">
                                            <input class="" type="text">
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
                                    <a class="button" href="https://twitter.com/intent/tweet?text="
                                        target="_blank">
                                        <button id="記録・投稿" type="button"
                                            class="btn btn-lg nav_right_btn nav_right_btn_modal"
                                            data-toggle="modal">記録・投稿</button>
                                        <!-- <button id="記録・投稿" type="button" class="btn btn-lg nav_right_btn nav_right_btn_modal" data-toggle="modal" data-target="#exampleModal">記録・投稿</button> -->
                                    </a>
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
                </div>
            </div>
        </div>
    </div>
    <script>
    </script>
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
    <script type="text/javascript">
    google.load("visualization", "1", {packages:["corechart"]});
    google.setOnLoadCallback(
        function() {
            var data = google.visualization.arrayToDataTable([
                ['', ''],
                [1, 3],
                [2, 4],
                [3, 5],
                [4, 3],
                [32, 0]
            ]);
            
// [
//     { "month": 3, "day": 1, "time": 3 },
//     { "day": 2, "time": 4 },
//     { "day": 3, "time": 5 },
//     { "day": 4, "time": 3 },
//     { "day": 32, "time": 0 },
//     { "day": 10, "time": 5 }
// ]


            // オプション設定
            var options = {
                // title: 'Age vs. Weight comparison',
                //hAxis: { title: 'Age', minValue: 0, maxValue: 15 },
                //vAxis: { title: 'Weight', minValue: 0, maxValue: 15 },
                legend: 'none',
                'chartArea': { top: 10, 'width': '80%', 'height': '80%' },
                //hAxis:{showTextEvery:2}
                //vAxis:{gridlined:{count:7}}
                // legend:{position:'bottom'}
                // baselineColor: 'none',
                // gridlines: 'none',

                // baselineColor: "transparent",
                // gridlines: {
                //     color: "transparent"
                // },
                // textPosition: "none",
                // vAxes: {
                //     gridLines: {
                //         color: '#fffffff'
                //     }
                // },
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
    );
    </script>
</body>

</html>
