<?php
include "mysqlConnect.php";
$mysqli_connect = connect_Mysqli();

$id = $_POST['inputId'];
$name = $_POST['inputName'];
$email = $_POST['inputEmail'];

//작성한 이메일과 이름, 아이디에 해당하는 비밀번호를 찾는다.
$query = "select * from user where id='$id' AND name='$name' AND email='$email'";
$result = mysqli_query($mysqli_connect, $query);
$row = mysqli_fetch_array($result);
$password = $row['password'];

//작성한 정보에 관한 비밀번호가 없다면
if($row == null){
    echo '<script type="text/javascript">alert("해당하는 회원정보를 찾을 수 없습니다.");</script>';
}else{

    //새로운 비밀번호를 제작해 사용자에게 새로운 비밀번호를 알려준다.
    $password = passwordGenerater();
    $encrypted_passwd = password_hash($password, PASSWORD_DEFAULT);
    echo "<script>alert('새 비밀번호는 {$password}입니다.');</script>";

    $sql = "UPDATE user SET password='$encrypted_passwd' WHERE id='$id' AND name='$name' AND email='$email'";

    if($mysqli_connect->query($sql) === true){
        echo "<script>location.href='login.php';</script>";
    }else{
        //echo mysqli_error($mysqli_connect);
        //echo "실패";
    }
}

function passwordGenerater() {
    $length = 10;
    $characters = "0123456789";
    $characters .= "abcdefghijklmnopqrstuvwxyz";
    $characters .= "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $string_generated = "";
    $nmr_loops = $length;
    while ($nmr_loops--) {
        $string_generated .= $characters[mt_rand(0, strlen($characters))];
    }
    return $string_generated;
}

?>
