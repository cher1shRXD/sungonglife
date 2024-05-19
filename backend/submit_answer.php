<?php
include "./mysql_conn.php";
error_reporting(E_ALL);
ini_set("display_errors", 1);
@session_start();
if(isset($_SESSION['tch_id'])) {
    echo "<script>alert(\"선생님께서는 문제풀이에 참여할 수 없습니다.\"); location.replace('../main/');</script>";
    return;
}
if(!isset($_SESSION['st_id'])){
    echo "<script>alert(\"로그인 후 이용해주세요.\"); location.replace('../main/');</script>";
    return;
}
$probId = $_GET['probId'];
$typed_answer = $_POST['answer'];
$get_answer = "SELECT * FROM PROBLEM WHERE `id` = '{$probId}';";
$answer_sql = mysqli_query($conn, $get_answer);
while ($answer_row = mysqli_fetch_array($answer_sql)) {
    $original = $answer_row['answer'];
    $add_chall = $answer_row['challenged'] + 1;
    $add_solv = $answer_row['solved'] + 1;
}
$solver_info = "SELECT * FROM USER WHERE `id` = '{$_SESSION['st_id']}';";
$get_info = mysqli_query($conn, $solver_info);
while ($solver_row = mysqli_fetch_array($get_info)) {
    $chall = $solver_row['joined_probs'] + 1;
    $score = $solver_row['score'] + 1;
}

if ($typed_answer == $original) {
    $update_user = "UPDATE USER SET `joined_probs` = '{$chall}', `score` = '{$score}'  WHERE `id` = '{$_SESSION['st_id']}';";
    $update_prob = "UPDATE PROBLEM SET `challenged` = '{$add_chall}', `solved` = '{$add_solv}'  WHERE `id` = '{$probId}';";
    $record = "INSERT INTO SOLVED (`solver_id`, `prob_id`) values ('{$_SESSION['st_id']}','{$probId}');";
    mysqli_query($conn, $update_user);
    mysqli_query($conn, $update_prob);
    mysqli_query($conn, $record);
    echo "<script>alert(\"정답입니다! 수고하셨습니다.\"); location.replace('../main/newest_probs.php')</script>";
}else{
    $update_chall = "UPDATE USER SET `joined_probs` = '{$chall}'  WHERE `id` = '{$_SESSION['st_id']}';";
    $update_prob = "UPDATE PROBLEM SET `challenged` = '{$add_chall}'  WHERE `id` = '{$probId}';";
    mysqli_query($conn, $update_chall);
    mysqli_query($conn, $update_prob);
    echo "<script>alert(\"오답입니다! 다시 도전해주세요.\"); history.back();</script>";
}

include "./mysql_close.php";


?>
