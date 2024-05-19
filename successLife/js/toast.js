//1. 토스트 메시지, 버튼요소를 변수에 대입
let tostMessage = document.getElementById('tost_message');
let tostBtn = document.getElementById('tost_btn');

//2. 토스트 메시지 노출-사라짐 함수 작성
function tostOn(){
    tostMessage.classList.add('active');
    setTimeout(function(){
        tostMessage.classList.remove('active');
    },1000);
}