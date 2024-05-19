<?php

include "./mysql_conn.php";

error_reporting( E_ALL );
ini_set( "display_errors", 1 );

$st_id = mysqli_real_escape_string($conn,$_POST['st_id']);
$st_pw = mysqli_real_escape_string($conn,$_POST['st_pw']);

if ($st_id == "" || $st_pw == "") {
    echo "<script>alert(\"모든 입력칸을 다 채워주세요.\"); history.back();</script>";
    return;
}
$find_user = "SELECT * FROM USER WHERE id='$st_id';";
$find_result = mysqli_query($conn,$find_user);
$check_exists = mysqli_num_rows($find_result);
if ($check_exists == null) {
    echo "<script>alert(\"학번을 확인해주세요\"); history.back();</script>";
    return;
}
while($info_row = mysqli_fetch_array($find_result)) {
    $origin_pw = $info_row['pwd'];
    if(password_verify($st_pw, $origin_pw)) {
        @session_start();
        $_SESSION['st_id'] = $info_row["id"];
    }else{
        echo "<script>alert(\"비밀번호가 틀립니다.\"); history.back();</script>";
        return;
    }
    if(isset($_SESSION['st_id'])) {
        echo "<script>alert(\"로그인 성공\"); location.href=\"../main\";</script>";
    }
}


include "./mysql_close.php";
?>
