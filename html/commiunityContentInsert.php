<?php
include "headerNav.php";
$mysqli_connect = connect_Mysqli();

//사용자가 작성한 게시물 정보를 가져온다.
$title = $_POST["title"];
$content = $_POST["content"];

$query = "select * from commiunity";
$data = mysqli_query($mysqli_connect, $query);

//게시물에 표시할 게시물 수
$contentsNum = mysqli_num_rows($data) + 1;
//게시물에 표시할 날짜
$currentDate = date("Y-m-d", time());

//게시물에 표시할 유저 아이디
session_start();
$user_id = $_SESSION['session_user_id'];
$user_idx = $_SESSION['session_user_idx'];

//이미지를 넣었다면
if(basename($_FILES["image"]["name"]) != null){

    //이미지의 경로를 정하고 이미지 이름을 수정
    //이미지의 이름을 곂치지 않게 하기 위해 원래이미지의 이름 + 날짜,시분초로 수정
    $target_dir = "image/";
    $target_file = $target_dir.date("Y.m.d.H:i:s").basename($_FILES["image"]["name"]);
    //업로드가 제대로 됬다면 1 아니라면 0
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    //이미지가 아닌 다른 파일을 넣었을때의 처리
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo '<script type="text/javascript">alert("이미지만 등록할 수 있습니다.");</script>';
            $uploadOk = 0;
        }
    }

    //이미지 크기에 따른 처리
    if ($_FILES["image"]["size"] > 500000) {
        echo '<script type="text/javascript">alert("파일의 크기가 너무 큽니다.");</script>';
        $uploadOk = 0;
    }

    //이미지 타입에 따른 처리
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
        echo '<script type="text/javascript">alert("JPG, JPEG, PNG & GIF 이미지만 등록할 수 있습니다.");</script>';
        $uploadOk = 0;
    }

    // 이미지 업로드 조건에 충족했는지에 따른 처리
    if ($uploadOk == 0) {
        //충족하지 못했다면 다시 설정할 수 있도록 전 페이지로 이동
        echo '<script type="text/javascript">alert("파일이 업로드가 되지 않았습니다.");</script>';
        echo "<script>history.back();</script>";

        //충족했다면 이미지와 게시물 정보들을 데이터베이스 안에 넣는다.
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {

            $sql = "INSERT INTO commiunity (user_idx, title, content, image, date, writer) VALUES ('$user_idx', '$title', '$content', '$target_file', '$currentDate', '$user_id')";

            if($mysqli_connect->query($sql) === true){
                echo "<script>location.href='commiunityPost.php?idx=$contentsNum'</script>";

            }else{
                echo mysqli_error($mysqli_connect);
                echo "실패";
            }

        } else {
            echo '<script type="text/javascript">alert("파일이 업로드 되는 중에 에러가 발생했습니다.");</script>';
        }
    }
    //이미지를 넣지 않고 게시물을 작성했다면
}else{
    //게시물 정보들을 데이터베이스 안에 넣는다.
    $sql = "INSERT INTO commiunity (user_idx, title, content, date, writer) VALUES ('$user_idx', '$title', '$content', '$currentDate', '$user_id')";

    if($mysqli_connect->query($sql) === true){
        echo "<script>location.href='commiunityPost.php?idx=$contentsNum'</script>";

    }else{
        echo mysqli_error($mysqli_connect);
        echo "실패";
    }
}
?>