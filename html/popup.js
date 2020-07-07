function setCookie(name, value, expiredays){
    var todayDate = new Date();
    todayDate.setDate (todayDate.getDate() + expiredays);
    document.cookie = name + "=" + escape(value) + "; path=/; expires=" + todayDate.toGMTString() + ";";
}
//팝업창에서 1일동안 이 창을 보지 않음 버튼을 누르면
//쿠키에 하루동안 팝업창을 띄우지 않게하기 위해 쿠키에 값을 저장해놓음
function closePop(){
    if (document.frm.pop.checked){
        setCookie("isPopUpDeleted", "done", 1);
    }
    self.close();
}