<?php
include "./mysql_conn.php";

error_reporting( E_ALL );
ini_set( "display_errors", 1 );
$st_name = mysqli_real_escape_string($conn,$_POST['st_name']);
$st_pw = password_hash(mysqli_real_escape_string($conn,$_POST['st_pw']),PASSWORD_DEFAULT);
$st_pw_check = password_hash(mysqli_real_escape_string($conn,$_POST['st_pw_check']),PASSWORD_DEFAULT);
$st_id = mysqli_real_escape_string($conn,$_POST['st_id']);
$find_user = "SELECT * FROM USER WHERE id='{$_POST['st_id']}';";
$find_result = mysqli_query($conn,$find_user);
$check_exists = mysqli_num_rows($find_result);

if ($st_name == "" || $st_pw == "" || $st_pw_check == "" || $st_id == "") {
    echo "<script>alert(\"모든 입력칸을 다 채워주세요.\"); history.back();</script>";
    return;
}
if ($st_id < 1101 || $st_id > 3218) {
    echo "<script>alert(\"유효하지 않은 학번입니다.\"); history.back();</script>";
    return;
}
if ($check_exists != null) {
    echo "<script>alert(\"이미 사용중인 학번입니다.\"); history.back();</script>";
    return;
}
if ($_POST['st_pw'] != $_POST['st_pw_check']) {
    echo "<script>alert(\"비밀번호를 다시 확인해주세요.\"); history.back();</script>";
    return;
}
$regi_sql = "INSERT INTO USER (`id`,`name`,`pwd`,`points`,`score`,`joined_probs`) values ('{$st_id}','{$st_name}','{$st_pw}',0,0,0)";
mysqli_query($conn, $regi_sql);
echo "<script>alert(\"회원가입이 완료되었습니다. 로그인 해주세요.\"); location.href='../main';</script>";


include "./mysql_close.php";

?>

