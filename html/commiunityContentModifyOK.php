<?php
include "headerNav.php";
$mysqli_connect = connect_Mysqli();

$title = $_POST["title"];
$content = $_POST["content"];
$contentsNum = $_GET['idx'];

$target_dir = "image/";
$target_file = $target_dir.date("Y.m.d.H:i:s").basename($_FILES["image"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

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

// Check if file already exists
if (file_exists($target_file)) {
    echo '<script type="text/javascript">alert("해당이미지는 이미 있습니다. 이미지의 이름을 바꿔주세요");</script>';
    $uploadOk = 0;
}

// Check file size
if ($_FILES["image"]["size"] > 500000) {
    echo '<script type="text/javascript">alert("파일의 크기가 너무 큽니다.");</script>';
    $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    echo '<script type="text/javascript">alert("JPG, JPEG, PNG & GIF 이미지만 등록할 수 있습니다.");</script>';
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo '<script type="text/javascript">alert("파일이 업로드가 되지 않았습니다.");</script>';

    // if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
    } else {
        echo '<script type="text/javascript">alert("파일이 업로드 되는 중에 에러가 발생했습니다.");</script>';
    }
}

$sql = "UPDATE commiunity SET title='$title', content ='$content', image ='$target_file' WHERE idx = '$contentsNum'";

if($mysqli_connect->query($sql) === true){
    echo "<script>location.href='commiunityPost.php?idx=$contentsNum'</script>";
}else{
    echo mysqli_error($mysqli_connect);
    echo "실패";
}
?>