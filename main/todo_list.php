<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=a, initial-scale=1.0">
    <link rel="stylesheet" href="/css/default.css">
    <link rel="stylesheet" href="/css/todo_list.css">
    <link rel="stylesheet" href="/css/header.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>선공인생 - 선인에서 공부하고 인생을 갓생으로</title>
    <script>
        <?php
        include "../js/mobile_menu.js";
        ?>
    </script>
</head>
<body>
<?php
include "../backend/mysql_conn.php";

error_reporting( E_ALL );
ini_set( "display_errors", 1 );
@session_start();
if(!isset($_SESSION['st_id'])){
    if(!isset($_SESSION['tch_id'])) {
        echo "<script>alert(\"로그인 후 이용해주세요\"); location.replace('../main')</script>";
        return;
    }
}
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
<?php include_once "../main/header.php" ?>
<div id="canvas">
    <?php include "../main/mobile_menu.php"; ?>
    <div class="main" id="main">
        <h1>To Do List</h1>
        <div id="td_btns">
            <button type="button" class="btn btn-success">작성하기</button>
        </div>
        <div id="list_area">
            <div class="todo_box">
                <div class="todo_title">
                    <h1>오늘 할일</h1>
                    <img src="../svg/td_chk.svg" alt="">
                </div>
                <div class="todo_text">
                    <p>오늘 할일들 리스트</p>
                </div>
                <div class="mng_btns">
                    <button type="button" class="btn btn-success">완료로 표시</button>
                    <button type="button" class="btn btn-danger">삭제</button>
                </div>
            </div>
            <div class="todo_box">
                <div class="todo_title">
                    <h1>오늘 할일</h1>
                    <img src="../svg/td_chk.svg" alt="">
                </div>
                <div class="todo_text">
                    <p>오늘 할일들 리스트</p>
                </div>
                <div class="mng_btns">
                    <button type="button" class="btn btn-success">완료로 표시</button>
                    <button type="button" class="btn btn-danger">삭제</button>
                </div>
            </div>
            <div class="todo_box">
                <div class="todo_title">
                    <h1>오늘 할일</h1>
                    <img src="../svg/td_chk.svg" alt="">
                </div>
                <div class="todo_text">
                    <p>오늘 할일들 리스트</p>
                </div>
                <div class="mng_btns">
                    <button type="button" class="btn btn-success">완료로 표시</button>
                    <button type="button" class="btn btn-danger">삭제</button>
                </div>
            </div>
            <div class="todo_box">
                <div class="todo_title">
                    <h1>오늘 할일</h1>
                    <img src="../svg/td_chk.svg" alt="">
                </div>
                <div class="todo_text">
                    <p>오늘 할일들 리스트</p>
                </div>
                <div class="mng_btns">
                    <button type="button" class="btn btn-success">완료로 표시</button>
                    <button type="button" class="btn btn-danger">삭제</button>
                </div>
            </div>
            <div class="todo_box">
                <div class="todo_title">
                    <h1>오늘 할일</h1>
                    <img src="../svg/td_chk.svg" alt="">
                </div>
                <div class="todo_text">
                    <p>오늘 할일들 리스트</p>
                </div>
                <div class="mng_btns">
                    <button type="button" class="btn btn-success">완료로 표시</button>
                    <button type="button" class="btn btn-danger">삭제</button>
                </div>
            </div>
            <div class="todo_box">
                <div class="todo_title">
                    <h1>오늘 할일</h1>
                    <img src="../svg/td_chk.svg" alt="">
                </div>
                <div class="todo_text">
                    <p>오늘 할일들 리스트</p>
                </div>
                <div class="mng_btns">
                    <button type="button" class="btn btn-success">완료로 표시</button>
                    <button type="button" class="btn btn-danger">삭제</button>
                </div>
            </div>
            <div class="todo_box">
                <div class="todo_title">
                    <h1>오늘 할일</h1>
                    <img src="../svg/td_chk.svg" alt="">
                </div>
                <div class="todo_text">
                    <p>오늘 할일들 리스트</p>
                </div>
                <div class="mng_btns">
                    <button type="button" class="btn btn-success">완료로 표시</button>
                    <button type="button" class="btn btn-danger">삭제</button>
                </div>
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
    include "../js/chk_upload.js";
    include "../backend/mysql_close.php";
    ?>
</script>
</body>
</html>

