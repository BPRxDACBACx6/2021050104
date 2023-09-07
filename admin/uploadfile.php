<!DOCTYPE html>
<html>
<head>
    <title>File Upload</title>
</head>
<body>
<form action="uploadfile.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label class="label-control col-xl-8">Tải ảnh lên: </label>
        <div class="col-xl-10">
            <input type="file" id="txtFile" name="txtFile" class="form-control"/>
        </div>
    </div>
    <div class="form-group">
        <div class="col-xl-10">
            <input type="submit" value="Tải lên" name="btnSubmit" class="btn btn-primary" />
        </div>
    </div>
</form>
<?php
$target_dir = "../uploads/";
$target_file = $target_dir . basename($_FILES["txtFile"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Kiểm tra xem file đã có chưa
if (file_exists($target_file)) {
  echo "Rất tiếc, ảnh này hiện đã có.</br>";
  $uploadOk = 0;
}

// Kiểm tra kích thước
if ($_FILES["txtFile"]["size"] > 1000000) {
  echo "Rất tiếc, kích thước ảnh của bạn quá lớn.</br>";
  $uploadOk = 0;
}

// Những dạng file ảnh được cho phép
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Rất tiếc, chỉ chấp nhận ảnh dạng JPG, JPEG, PNG & GIF.</br>";
  $uploadOk = 0;
}
// Jmester Regex
// 
if ($uploadOk == 0) {
  echo "Rất tiếc, ảnh của bạn đã không được tải lên.</br>";
// Tải ảnh lên thành công
} else {
  if (move_uploaded_file($_FILES["txtFile"]["tmp_name"], $target_file)) {
    // echo "<img src='$target_file'>";
    // echo "<h1>$target_file</h1>";
    echo "Ảnh ". htmlspecialchars( basename( $_FILES["txtFile"]["name"])). " đã được tải lên thành công";
  } else {
    echo "Rất tiếc, đã có lỗi trong việc tải ảnh lên";
  }
}
?>

