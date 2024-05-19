document.getElementById("prob_form").onsubmit=function(){
    var confirm_chk= confirm("출제하시겠습니까? 출제 후에는 문제를 수정할 수 없습니다.");
    if (!confirm_chk) {
        return false;
    }
}