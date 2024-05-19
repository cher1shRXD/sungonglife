<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=a, initial-scale=1.0">
    <link rel="stylesheet" href="/css/default.css">
    <link rel="stylesheet" href="/css/prob_solve.css">
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
$solver = 0000;
if(isset($_SESSION['st_id'])) {
    $solver = $_SESSION['st_id'];
}
$get_record = "SELECT * FROM SOLVED WHERE `solver_id` = '{$solver}' AND `prob_id` = '{$_GET['probId']}';";
$record_nums = mysqli_num_rows(mysqli_query($conn, $get_record));
if ($record_nums > 0) {
    echo "<script>alert(\"이미 푼 문제에는 참여가 불가능 합니다.\"); location.replace('../main/newest_probs.php')</script>";
    return;
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
        <?php

        $probId = $_GET['probId'];
        $get_probInfo = "SELECT * FROM PROBLEM WHERE `id`='{$probId}'";
        $get_probInfo_query = mysqli_query($conn, $get_probInfo);
        while ($probInfo_row = mysqli_fetch_array($get_probInfo_query)) {
            $title = $probInfo_row['title'];
            $picture = $probInfo_row['picture'];
            $description = $probInfo_row['description'];
            $writer = $probInfo_row['writer'];
            $answer = $probInfo_row['answer'];
            $picture_root = "../problems/".$picture;
        }
        ?>
        <div id="wrapper">
            <div id="prob_wrapper">
                <?php
                if(!empty($picture)){
                    echo
                    "
                    <div id=\"picture_area\">
                        <img src=\"$picture_root\" alt=\"\">
                    </div>
                    ";
                }
                ?>

                <div id="word_area">
                    <h1><?php echo "$title";?></h1>
                    <p id="description"><?php echo "$description";?></p>
                    <p id="writer"><strong><?php echo "$writer";?></strong>선생님이 출제하셨습니다.</p>
                </div>
            </div>
            <div id="answer_wrapper">
                <form action="../backend/submit_answer.php?probId=<?php echo "$probId";?>" method="post">
                    <input type="text" class="form-control" id="answer_input" name="answer" placeholder="답을 적어주세요!">
                    <button type="submit" class="btn btn-primary" id="answer_submit">제출</button>
                </form>

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
