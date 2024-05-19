<?php 
@session_start();
?>

<div id="header">
    <div id="menu_btn">
        <img src="../svg/menu_default.svg" alt="" onclick="isOn();">
    </div>
    <div id="logo">
        <h1 onclick="go_main();">STORIZZ</h1>
        <p>"Our learning stories got RIZZ!"</p>
    </div>
    <div id="hd_btns">
        <ul class="hd_ul">
            <li class="hd_li"><p id="todo_list" onclick="click_menu(this);">Todo리스트</p></li>
            <li class="hd_li"><p id="pop_probs" onclick="click_menu(this);">인기문제</p></li>
            <li class="hd_li"><p id="newest_probs" onclick="click_menu(this);">최신문제</p></li>
            <li class="hd_li">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        과목별 문제
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" onclick="sepBySub(this);">수학</a></li>
                        <li><a class="dropdown-item" onclick="sepBySub(this);">과학</a></li>
                        <li><a class="dropdown-item" onclick="sepBySub(this);">영어</a></li>
                        <li><a class="dropdown-item" onclick="sepBySub(this);">국어</a></li>
                        <li><a class="dropdown-item" onclick="sepBySub(this);">사회</a></li>
                    </ul>
                </div>
            </li>
            <li class="hd_li">
                <?php 
                if (isset($_SESSION['tch_id'])) {
                    echo "<button type=\"button\" class=\"btn btn-primary logBtn\" onclick=\"log_out();\">로그아웃</button>";
                }
                elseif (isset($_SESSION['st_id'])) {
                    echo "<button type=\"button\" class=\"btn btn-primary logBtn\" onclick=\"log_out();\">로그아웃</button>";
                }else {
                    echo 
                    "
                    <button type=\"button\" class=\"btn btn-secondary logBtn\" onclick=\"choose_job();\">회원가입</button>
                    <button type=\"button\" class=\"btn btn-primary logBtn\" onclick=\"login_job();\">로그인</button>
                    ";
                }
                
                ?>
                
            </li>
        </ul>  
    </div>
</div>