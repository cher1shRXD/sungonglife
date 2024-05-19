<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=a, initial-scale=1.0">
    <link rel="stylesheet" href="/css/default.css">
    <link rel="stylesheet" href="/css/prob_write.css">
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
        <div class="main" id="main">
            <div id="wrapper">
                <form action="../backend/upload_prob.php" method="post" onsubmit="return false" id="prob_form" enctype="multipart/form-data" >
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">제목(필수)</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="title">
                    </div>
                    <div>
                        <label for="formFileLg" class="form-label">첨부사진</label>
                        <input class="form-control form-control-lg" id="formFileLg" type="file" name="picture">
                    </div>
                    <div class="mb-3" id="desc_area">
                        <label for="exampleFormControlTextarea1" class="form-label">문제설명(필수)</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="description" placeholder="상세한 문제 설명을 적어주세요! (정답의 정확한 형식을 적어주시면 좋습니다.)"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">정답(필수)</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="answer" >
                    </div>
                    <button type="submit" class="btn btn-outline-primary">출제하기</button>
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
            include "../js/chk_upload.js";
            include "../backend/mysql_close.php";
        ?>
    </script>
</body>
</html>