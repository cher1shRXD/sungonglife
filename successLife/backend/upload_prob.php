<?php

include "./mysql_conn.php";
error_reporting( E_ALL );
ini_set( "display_errors", 1 );
@session_start();
$title = $conn -> real_escape_string($_POST['title']);
$picture = $conn -> real_escape_string($_FILES['picture']['name']);
$tmp_picture = $conn -> real_escape_string($_FILES['picture']['tmp_name']);
$description = $conn -> real_escape_string($_POST['description']);
$answer = $conn -> real_escape_string($_POST['answer']);
$ext_list = ['png','jpg','jpeg','gif','JPG','PNG','JPEG','GIF'];
$get_writer = mysqli_query($conn,"SELECT * FROM TEACHER WHERE id='{$_SESSION['tch_id']}';");
while ($writer_row = mysqli_fetch_array($get_writer)) {
    $writer = $writer_row['name'];
    $subject = $writer_row['subject'];
}

$tmp_ext_name = explode(".",$picture);
$ext_name = end($tmp_ext_name);
if ($title == "" || $description == "" || $answer == "") {
    echo "<script>alert(\"필수 항목을 모두 채워주세요.\"); history.back();</script>";
    return;
}
if (!empty($picture)) {
    if (!in_array($ext_name,$ext_list)) {
        echo "<script>alert(\"허용되지 않은 파일 형식입니다.\"); history.back();</script>";
        return;
    }else{
        $hashed = uniqid();
        $with_pic = "INSERT INTO PROBLEM (`title`,`picture`,`description`,`writer`,`subject`,`solved`,`challenged`,`answer`) values ('{$title}','{$hashed}','{$description}','{$writer}','{$subject}',0,0,'{$answer}');";
        mysqli_query($conn, $with_pic);
        $get_prob = mysqli_query($conn,"SELECT * FROM PROBLEM ORDER BY `id` DESC LIMIT 1;");
        while ($prob_row = mysqli_fetch_array($get_prob)) {
            $get_probId = $prob_row['id'];
        }
        $dir_name = "../problems/";
        $pic_root = $dir_name.$hashed;
        move_uploaded_file($tmp_picture, $pic_root);
    }
}else{
    $without_pic = "INSERT INTO PROBLEM (`title`,`description`,`writer`,`subject`,`solved`,`challenged`,`answer`) values ('{$title}','{$description}','{$writer}','{$subject}',0,0,'{$answer}');";
    mysqli_query($conn, $without_pic);

}

echo "<script>alert(\"업로드가 완료되었습니다.\"); location.replace('../main');</script>";
include "./mysql_close.php";
?>