<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=a, initial-scale=1.0">
    <link rel="stylesheet" href="/css/default.css">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/header.css">

    <script>
        <?php
            include "../js/mobile_menu.js"; 
        ?>
    </script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>선공인생 - 선인에서 공부하고 인생을 갓생으로</title>
</head>

<body>
    <div id="loading">

    </div>
    <?php
    include "../backend/mysql_conn.php";
    include "../main/mobile_menu.php";
    ?>
        <?php include_once "../main/header.php" ?>
        <div id="tost_message">로그인 후 이용해주세요.</div>
        <div class="main" id="main">
            <div id="phrase">
                <p><i>"STORIZZ"</i><br>선인에서 공부하기 가장 좋은 방법.</p>
                <div id="shortcut">
                    <div id="icons">
                        <span class="sub_icon" id="과학" onclick="sub_icon(this);"><img src="../svg/science.svg" alt="" id="science"><label for="science">과학</label></span>
                        <span class="sub_icon" id="수학" onclick="sub_icon(this);"><img src="../svg/math.svg" alt="" id="math"><label for="math">수학</label></span>
                        <span class="sub_icon" id="국어" onclick="sub_icon(this);"><img src="../svg/korean.svg" alt="" id="korean"><label for="korean">국어</label></span>
                        <span class="sub_icon" id="영어" onclick="sub_icon(this);"><img src="../svg/english.svg" alt="" id="english"><label for="english">영어</label></span>
                        <span class="sub_icon" id="사회" onclick="sub_icon(this);"><img src="../svg/social_study.svg" alt="" id="social_study"><label for="social_study">사회</label></span>
                    </div>
                    <div id="contact">
                        <strong>개발자 누구?</strong>
                        <a href="https://www.instagram.com/rlaxd123/" target="_blank">저요! -> @rlaxd123 <img src="../svg/insta.svg" alt=""></a>
                        <strong>궁금한게 있나요?</strong>
                        <a href="tel:010-4890-1466">전화줘요 -> 010-4890-1466</a>
                    </div>
                </div>
            </div>
            <div id="h1">
                <h1>문제풀러 가기</h1>
            </div>
            <div id="home_menu">
                <div id="profile">
                    <div id="user_info">
                        <?php
                        if (isset($_SESSION['tch_id'])) {
                            echo
                            "
                            <img src=\"/svg/teacher.svg\" alt=\"\">
                            ";
                        }
                        elseif (isset($_SESSION['st_id'])) {
                            echo
                            "
                            <img src=\"/svg/student.svg\" alt=\"\">
                            ";
                        }
                        ?>
                        <div id="info_box">
                            <?php
                            if (isset($_SESSION['tch_id'])) {
                                if (mb_strlen( $tch_name, 'utf-8' ) >= 5) {
                                    $tch_name = mb_substr($tch_name, 0,3,'utf-8').'...';
                                }
                                echo
                                "
                            <h2 id=\"user_name\">{$tch_name}</h2>
                            <p id=\"user_id\">{$tch_subject}</p>
                            ";
                            }
                            elseif (isset($_SESSION['st_id'])) {
                                if (mb_strlen( $st_name, 'utf-8' ) >= 5) {
                                    $st_name = mb_substr($st_name, 0,3,'utf-8').'...';
                                }
                                echo
                                "
                            <h2 id=\"user_name\">{$st_name}</h2>
                            <p id=\"user_id\">{$_SESSION['st_id']}</p>
                            ";
                            }else{
                                echo "<h2 id=\"user_name\">로그인해주세요</h2>";
                            }
                            ?>

                        </div>
                    </div>
                    <div id="stat">
                    <ul>
                        <?php

                        if (isset($_SESSION['st_id'])) {
                            echo
                            "
                            <li><p>참가한 문제 수:{$st_joined_probs}</p></li>
                            <li><p>누적 점수:{$st_score}</p></li>
                            <li><p>정답률:{$st_correct_rate}%</p></li>
                            <li><p>누적 포인트:{$st_points}</p></li>
                            ";
                        }
                        if (isset($_SESSION['tch_id'])) {
                            echo
                            "
                            <li><h3>학생들을 위해 문제를 출제해주세요!</h3></li>
                            <li><button type=\"button\" class=\"btn btn-outline-primary\"  onclick=\"write_prob();\">출제하기</button></li>
                            <li><button type=\"button\" class=\"btn btn-outline-primary\"  onclick=\"manage_prob();\">문제 관리하기</button></li>
                            ";
                        }

                        ?>
                    </ul>
                </div>
            </div>
                <div class="wrap_prob">
                    <div id="newest_probs" class="prob_box" onclick="click_menu(this)">
                        <img src="../svg/new.svg" alt="">
                        <h1>최신문제</h1>
                    </div>
                </div>
                <div class="wrap_prob">
                    <div id="todo_list" class="prob_box" onclick="click_menu(this)">
                        <img src="../svg/todo_list.svg" alt="">
                        <h1>투두리스트</h1>
                    </div>
                </div>
                <div class="wrap_prob">
                    <div id="pop_probs" class="prob_box" onclick="click_menu(this)">
                        <img src="../svg/rising.svg" alt="">
                        <h1>인기문제</h1>
                    </div>
                </div>
            </div>

        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
        <?php 
            include "../js/page_move.js";
            include "../js/toast.js";
            include "../js/check_login.js";
            include "../backend/mysql_close.php";
        ?>
    </script>
</body>

</html>