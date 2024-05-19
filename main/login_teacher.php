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

    ?>
    <?php include_once "../main/header.php" ?>
    <div id="canvas">
        <div id="tost_message">로그인 후 이용해주세요.</div>
        <?php include_once "../main/mobile_menu.php"?>
        <div class="main"  id="main">
            <h1>선생님 로그인</h1>
            <div id="form_box">
                <form action="../backend/tch_login.php" method="post">
                    <label for="tch_name">아이디</label>
                    <input type="text" placeholder="ID" name="tch_id" class="st_form_input">
                    <label for="tch_pw">비밀번호</label>
                    <input type="password" placeholder="비밀번호(6자 이상)" name="tch_pw" class="st_form_input" id="tmp_pw" minlength="6">
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