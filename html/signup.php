<?php
include "mysqlConnect.php";

$mysqli_connect = connect_Mysqli();

$id = $_POST['inputID'];
$name = $_POST['inputName'];
$password = $_POST['inputPassword'];
$passwordCheck = $_POST['inputPasswordCheck'];
$email = $_POST['InputEmail'];

echo $id;
echo $name;
echo $password;
echo $email;

//PHP에서 유효성 재확인

//아이디 중복검사.

$sql = "SELECT * FROM user WHERE id = '{$id}'";
$res = $mysqli_connect->query($sql);
if($res->num_rows >= 1){
    //echo '이미 존재하는 아이디가 있습니다.';
    exit;
}

//echo '이미 존재하는 아이디가 없습니다.';

//비밀번호 일치하는지 확인
if($password !== $passwordCheck){
    //echo '비밀번호가 일치하지 않습니다.';
    exit;
}else{
    //비밀번호를 암호화 처리.
    $encrypted_passwd = password_hash($password, PASSWORD_DEFAULT);
    //$password = md5($password);
}

//echo '비밀번호가 일치합니다.';

//닉네임이 빈값이 아닌지
if($name == ''){
    //echo '이름의 값이 없습니다.';
}

//echo '이름의 값이 있습니다.';

//이메일 주소가 올바른지
//$checkEmailAddress = filter_var($email, FILTER_VALIDATE_EMAIL);
//if($checkEmailAddress != true){
//   echo "올바른 이메일 주소가 아닙니다.";
//   exit;
//}

//echo '올바른 이메일 주소가 맞습니다.';

//이제부터 넣기 시작
$sql = "INSERT INTO user (id, password, email) VALUES('$id','$encrypted_passwd','$email')";

if($mysqli_connect->query($sql) === true){
    //echo '회원가입 성공';
    echo "<script>location.href='login.php'</script>";
}else{
    echo mysqli_error($mysqli_connect);
    //echo "실패";
}
?>