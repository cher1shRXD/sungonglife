<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=a, initial-scale=1.0">
    <link rel="stylesheet" href="/css/default.css">
    <link rel="stylesheet" href="/css/view_prob.css">
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
    echo "<script>alert(\"학생은 이용할 수 없는 기능입니다.\"); location.replace('../main')</script>";
    return;
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
    <div id="tost_message">로그인 후 이용해주세요.</div>
    <?php include_once "../main/mobile_menu.php"?>
    <div class="main" id="main">
        <h1>내가 낸 문제</h1>
        <div id="wrapper">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">제목</th>
                    <th scope="col">과목</th>
                    <th scope="col">해결</th>
                    <th scope="col">도전</th>
                    <th scope="col">관리</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $get_subject = "SELECT * FROM PROBLEM WHERE `writer` = '{$tch_name}' order by `id` DESC;";
                $subject_sql = mysqli_query($conn, $get_subject);
                while ($subject_row = mysqli_fetch_array($subject_sql)) {
                    $probId = $subject_row['id'];
                    $probTitle = $subject_row['title'];
                    $probWriter = $subject_row['writer'];
                    $probSubject = $subject_row['subject'];
                    $probChall = $subject_row['challenged'];
                    $probSol = $subject_row['solved'];
                    $spreadId = "problem_".$probId;
                    if (mb_strlen( $probTitle, 'utf-8' ) >= 7) {
                        $probTitle = mb_substr($probTitle, 0,5,'utf-8').'...';
                    }
                    if (mb_strlen( $probWriter, 'utf-8' ) >= 7) {
                        $probWriter = mb_substr($probWriter, 0,5,'utf-8').'...';
                    }
                    if (empty(mysqli_num_rows($subject_sql))) {
                        echo
                        "
                        <tr>
                            <td colspan='6'><h1>등록된 문제가 없습니다.</h1></td>
                        </tr>
                        ";
                    }
                    echo
                    "
                    <tr>
                        <th scope=\"row\">$probId</th>
                        <td id='$spreadId' onclick='solve_prob(this);' class='prob_title'>$probTitle</td>
                        <td>$probSubject</td>
                        <td>$probSol</td>
                        <td>$probChall</td>
                        <td><button type=\"submit\" onsubmit='return false;' class=\"btn btn-danger\" id='$spreadId' onclick='delete_prob(this)'>삭제</button></td>
                    </tr>
                    ";

                }
                ?>
                </tbody>
            </table>
        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script>
    <?php
    include "../js/toast.js";
    include "../js/page_move.js";
    include "../js/check_login.js";
    include "../backend/mysql_close.php";
    ?>
</script>
</body>
</html>

<?php
