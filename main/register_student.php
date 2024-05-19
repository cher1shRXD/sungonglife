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
    <?php include "../main/header.php" ?>
    <div id="canvas">
        <div id="tost_message">로그인 후 이용해주세요.</div>
        <?php include_once "../main/mobile_menu.php"?>
        <div class="main"  id="main">
            <h1>학생 회원가입</h1>
            <div id="form_box">
                <form action="../backend/st_register.php" method="post">
                    <label for="st_name">이름</label>
                    <input type="text" placeholder="김준범" name="st_name" class="st_form_input">
                    <label for="st_pw">비밀번호</label>
                    <input type="password" placeholder="비밀번호(6자 이상)" name="st_pw" class="st_form_input" id="tmp_pw" minlength="6">
                    <input type="password" placeholder="비밀번호 확인" name="st_pw_check" class="st_form_input">
                    <label for="st_id">학번</label>
                    <input type="number" placeholder="1학년 1반 15번 -> 1115" name="st_id" class="st_form_input" maxlength="4">
                    <div>
                        <button class="btn btn-primary" type="submit">회원가입</button>
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