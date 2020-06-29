function setCookie(name, value, expiredays){
    var todayDate = new Date();
    todayDate.setDate (todayDate.getDate() + expiredays);
    document.cookie = name + "=" + escape(value) + "; path=/; expires=" + todayDate.toGMTString() + ";";
}

function closePop(){
    if (document.frm.pop.checked){
        setCookie("popname", "done", 1);
    }
    self.close();
}