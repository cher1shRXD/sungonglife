var user_name = document.querySelector("#user_name").innerHTML;


function click_menu(e) {
    if (user_name == "로그인해주세요") {
        tostOn();
    }else{
        var get_id = e.getAttribute("id");
        var made_url = "../main/"+get_id+".php";
        location.href = made_url;
    }

}
