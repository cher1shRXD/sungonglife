<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=a, initial-scale=1.0">
    <link rel="stylesheet" href="/css/default.css">
    <link rel="stylesheet" href="/css/login.css">
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
        if (isset($_SESSION['st_id'])) {
            $logged_user = "SELECT * FROM USER WHERE id='{$_SESSION['st_id']}';";
            $user_result = mysqli_query($conn,$logged_user);
            while($info_st = mysqli_fetch_array($user_result)) {
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
        <?php include_once "../main/mobile_menu.php"?>
        <div class="main" id="main">
            <div id="tost_message">로그인 후 이용해주세요.</div>
            <h1>학생 로그인</h1>
            <div id="form_box">
                <form action="../backend/st_login.php" method="post">
                    <label for="st_id">학번</label>
                    <input type="number" placeholder="1학년 1반 15번 -> 1115" name="st_id" class="st_form_input" maxlength="4">
                    <label for="st_pw">비밀번호</label>
                    <input type="password" placeholder="비밀번호" name="st_pw" class="st_form_input" id="tmp_pw">
                    <div>
                        <button class="btn btn-primary" type="submit">로그인</button>
                    </div>
                </form>
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