<?php
include "headerNav.php";
$mysqli_connect = connect_Mysqli();

//등록할 상품의 정보를 가져온다.
$name = $_POST["name"];
$price = $_POST["price"];
$information = $_POST["information"];

//이미지를 넣었다면
if(basename($_FILES["image"]["name"]) != null){

    //이미지의 경로를 정하기
    $target_dir = "image/";
    $target_file = $target_dir.basename($_FILES["image"]["name"]);
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

            $sql = "INSERT INTO product (name, price, information, image) VALUES ('$name', '$price', '$information', '$target_file')";

            if($mysqli_connect->query($sql) === true){
                echo "<script>location.href='sell.php'</script>";

            }else{
                echo mysqli_error($mysqli_connect);
                echo "실패";
            }

        } else {
            echo '<script type="text/javascript">alert("파일이 업로드 되는 중에 에러가 발생했습니다.");</script>';
            echo "<script>history.back();</script>";
        }
    }
    //이미지를 넣지 않고 게시물을 작성했다면
}else{
    //게시물 정보들을 데이터베이스 안에 넣는다.
    $sql = "INSERT INTO product (name, price, information) VALUES ('$name', '$price', '$information')";

    if($mysqli_connect->query($sql) === true){
        echo "<script>location.href='sell.php'</script>";

    }else{
        echo mysqli_error($mysqli_connect);
        echo "실패";
    }
}
?>