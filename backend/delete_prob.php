<?php
include "./mysql_conn.php";
error_reporting(E_ALL);
ini_set("display_errors", 1);
@session_start();
if(isset($_SESSION['st_id'])) {
    echo "<script>alert(\"잘못된 접근입니다.\"); location.replace('../main/');</script>";
    return;
}
if(!isset($_SESSION['tch_id'])){
    echo "<script>alert(\"로그인 후 이용해주세요.\"); location.replace('../main/');</script>";
    return;
}
$probId = $_GET['probId'];
$info_del = "SELECT * FROM PROBLEM WHERE `id` = '{$probId}';";
$get_del = mysqli_query($conn, $info_del);
while ($del_row = mysqli_fetch_array($get_del)) {
    $stored_pic = $del_row['picture'];
    if (!empty($stored_pic)) {
        $file_root = "../problems/".$stored_pic;
        unlink($file_root);
    }
}
$del_sql = "DELETE FROM PROBLEM WHERE `id` = '{$probId}';";
mysqli_query($conn, $del_sql);
;

echo "<script>alert(\"삭제가 완료되었습니다.\"); location.replace('../main/');</script>";
include "./mysql_close.php";


?>
