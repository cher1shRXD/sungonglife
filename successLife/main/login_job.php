<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=a, initial-scale=1.0">
    <link rel="stylesheet" href="/css/default.css">
    <link rel="stylesheet" href="/css/register.css">
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
    
    ?>
    <?php include_once "../main/header.php" ?>
    <div id="tost_message">로그인 후 이용해주세요.</div>
    <div id="canvas">
        <?php include_once "../main/mobile_menu.php"?>
        <div class="main" id="main">
            <h1>선생님인가요, 학생인가요?</h1>
            <div id="choose_job">
                <div id="teacher" class="choose_box" onclick="login_teacher();">
                    <h2>선생님</h2>
                    <p>현재 재직중인 선생님입니다.</p>
                </div>
                <div id="student" class="choose_box"onclick="login_student();">
                    <h2>학생</h2>
                    <p>현재 재학중인 학생입니다.</p>
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