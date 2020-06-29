<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <script type="text/javascript" src="popup.js"></script>
    <title>popup</title>
</head>
<body>
<form name="frm" method="post" action="">
    <table width="" border="0" cellpadding="0" cellspacing="0">
        <tbody>
        <tr><img src="image/coffeeMachine.png" width="100%" height="70%" border="0"></tr>
        <tr><h3 style="text-align:center">오늘의 신상! 가성비 커피머신</h3></tr>
        <tr>
            <td height="30" align="right">
                <table border="0" cellpadding="0" cellspacing="2">
                    <tbody><tr>
                        <td><input class="PopupCheck" type="checkbox" name="pop" onclick="closePop()"></td>
                        <td style="font-size:15px;">1일동안 이 창을 열지 않음</td>
                        <td style="font-size:15px;"><a href="javascript:self.close();" onfocus="this.blur()">[닫기]</a></td>
                    </tr>
                    </tbody></table>
            </td>
        </tr>
        </tbody></table>
</form>
</body>