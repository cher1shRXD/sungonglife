var chk_open = false;
function isOn() {
    if (chk_open == false) {
        document.getElementById("mobile_menu").style.display = "flex";
        chk_open = true;
    }else{
        document.getElementById("mobile_menu").style.display = "none";
        chk_open = false;
    }
}