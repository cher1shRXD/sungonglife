function choose_job() {
    location.href = "../main/choose_job.php";
}
function register_student() {
    location.href = "../main/register_student.php";
}
function register_teacher() {
    location.href = "../main/register_teacher.php";
}
function login_job() {
    location.href = "../main/login_job.php";
}
function login_teacher() {
    location.href = "../main/login_teacher.php";
}
function login_student() {
    location.href = "../main/login_student.php";
}

function log_out() {
    location.href = "../backend/logout.php";
}
function go_main() {
    location.href = "../main";
}
function write_prob() {
    location.href = "../main/write_problem.php";
}
function manage_prob() {
    location.href = "../main/manage_problem.php";
}
var chk_log = document.getElementsByClassName("logBtn")[0].innerHTML;
function solve_prob(e) {
    if (chk_log == "로그아웃") {
        var probId = e.getAttribute("id").split("_")[1];
        var made_url = "../problems/read_prob.php?probId="+probId;
        location.replace(made_url);
    }else{
        tostOn();
    }
}
function sepBySub(e) {
    if (chk_log == "로그아웃") {
        var subject = e.innerHTML;
        var made_url = "../main/sepBySub.php?subject="+subject;
        location.replace(made_url);
    }else{
        tostOn();
    }
}
function sub_icon(e) {
    if (chk_log == "로그아웃") {
        var subject = e.getAttribute("id");
        var made_url = "../main/sepBySub.php?subject="+subject;
        location.replace(made_url);
    }else{
        tostOn();
    }
}
function delete_prob(e) {
    e.onsubmit=function(){
        const chk_del= confirm("문제를 삭제하시겠습니까? 되돌릴 수 없습니다.");
        if (!chk_del) {
            return false;
        }
    }
    if (chk_log == "로그아웃") {
        var probId = e.getAttribute("id").split("_")[1];
        var made_url = "../backend/delete_prob.php?probId="+probId;
        location.replace(made_url);
    }else{
        tostOn();
    }
}