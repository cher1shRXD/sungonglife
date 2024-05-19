<?php
include "./mysql_conn.php";

error_reporting( E_ALL );
ini_set( "display_errors", 1 );
$tch_id = mysqli_real_escape_string($conn,$_POST['tch_id']);
$tch_name = mysqli_real_escape_string($conn,$_POST['tch_name']);
$tch_pw = password_hash(mysqli_real_escape_string($conn,$_POST['tch_pw']),PASSWORD_DEFAULT);
$tch_pw_check = password_hash(mysqli_real_escape_string($conn,$_POST['tch_pw_check']),PASSWORD_DEFAULT);
$tch_subject = mysqli_real_escape_string($conn,$_POST['tch_subject']);
$find_user = "SELECT * FROM TEACHER WHERE id='{$_POST['tch_id']}';";
$find_result = mysqli_query($conn,$find_user);
$check_exists = mysqli_num_rows($find_result);
if ($tch_id == "" || $tch_name == "" || $tch_pw == "" || $tch_pw_check == "" || $tch_subject == "") {
    echo "<script>alert(\"모든 입력칸을 다 채워주세요.\"); history.back();</script>";
    return;
}
if ($check_exists != null) {
    echo "<script>alert(\"이미 사용중인 아이디입니다.\"); history.back();</script>";
    return;
}
if ($_POST['tch_pw'] != $_POST['tch_pw_check']) {
    echo "<script>alert(\"비밀번호를 다시 확인해주세요.\"); history.back();</script>";    
    return;
}
$regi_sql = "INSERT INTO TEACHER (`id`,`name`,`pwd`,`subject`) values ('{$tch_id}','{$tch_name}','{$tch_pw}','{$tch_subject}')";
mysqli_query($conn, $regi_sql);
echo "<script>alert(\"회원가입이 완료되었습니다. 로그인 해주세요.\"); location.href='../main';</script>";



include "./mysql_close.php";

?>

