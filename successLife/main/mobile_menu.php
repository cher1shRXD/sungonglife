<?php
@session_start();
include "../backend/mysql_conn.php";

error_reporting( E_ALL );
ini_set( "display_errors", 1 );
@session_start();
if (isset($_SESSION['st_id'])) {
    $logged_user = "SELECT * FROM USER WHERE id='{$_SESSION['st_id']}';";
    $user_result = mysqli_query($conn,$logged_user);
    while($info_st = mysqli_fetch_array($user_result)) {
        $st_name = $info_st['name'];
        $st_points = $info_st['points'];
        $st_score = $info_st['score'];
        $st_joined_probs = $info_st['joined_probs'];
        if ($st_joined_probs != 0) {
            $st_correct_rate = round($st_score/$st_joined_probs*100);
        }else{
            $st_correct_rate = 0;
        }
    }
}

if (isset($_SESSION['tch_id'])) {
    $logged_teacher = "SELECT * FROM TEACHER WHERE id='{$_SESSION['tch_id']}';";
    $teacher_result = mysqli_query($conn,$logged_teacher);
    while($info_tch = mysqli_fetch_array($teacher_result)) {
        $tch_name = $info_tch['name'];
        $tch_subject = $info_tch['subject'];
    }
}
?>
<div id="mobile_menu">

    <div id="menu_area">
        <div id="menu_close">
            <img src="../svg/menu_close.svg" alt="" onclick="isOn();">
        </div>
        <div id="menu_login_status">
            <?php
            if (isset($_SESSION['tch_id'])) {
                echo "<button type=\"button\" class=\"btn btn-primary\" onclick=\"log_out();\">로그아웃</button>";
            }
            elseif (isset($_SESSION['st_id'])) {
                echo "<button type=\"button\" class=\"btn btn-primary\" onclick=\"log_out();\">로그아웃</button>";
            }else {
                echo
                "
                        <button type=\"button\" class=\"btn btn-secondary\" onclick=\"choose_job();\">회원가입</button>
                        <button type=\"button\" class=\"btn btn-primary\" onclick=\"login_job();\">로그인</button>
                        ";
            }

            ?>
        </div>
        <div id="menu_profile">
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
                    <li><button type=\"button\" class=\"btn btn-outline-primary\" onclick=\"write_prob();\">출제하기</button></li>
                    <li><button type=\"button\" class=\"btn btn-outline-primary\"  onclick=\"manage_prob();\">문제 관리하기</button></li>
                    ";
                }

                ?>
            </ul>
        </div>
        <div id="menu_bar">
            <ul>
                <li id="todo_list" onclick="click_menu(this);">
                    <p>Todo리스트</p>
                </li>
                <li id="pop_probs" onclick="click_menu(this);">
                    <p>인기문제</p>
                </li>
                <li id="newest_probs" onclick="click_menu(this);">
                    <p>최신문제</p>
                </li>
            </ul>
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    과목별 문제
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" onclick="sepBySub(this);">수학</a></li>
                    <li><a class="dropdown-item" onclick="sepBySub(this);">과학</a></li>
                    <li><a class="dropdown-item" onclick="sepBySub(this);">영어</a></li>
                    <li><a class="dropdown-item" onclick="sepBySub(this);">국어</a></li>
                    <li><a class="dropdown-item" onclick="sepBySub(this);">사회</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div id="shadow" onclick="isOn();"></div>
</div>
