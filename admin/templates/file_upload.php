<?php
    if(isset($_POST["upload"])){
        $target_dir = "upload/";
        $target_file = $target_dir . basename($_FILES["img"]["name"]);
        $uploadOk = 1;
        $FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        if($FileType != "jpg" && $FileType != "png" && $FileType != "jpeg"
            && $FileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        if($uploadOk==0){
            echo "không thể upload file";
        }
        else{
            if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)){
                echo "upload file thành công";
                echo "<img src='$target_file'>";
                echo "<h1>$target_file</h1>";
            }
            else{
                echo "lỗi upload file";
            }
        }
    }
?>
<html>
    <head>

    </head>
    <body>
        <form action="file_upload.php" method="post" enctype="multipart/form-data">
            chọn file:
            <input type="file" name="img" id="">
            <input type="submit" value="Upload file" name="upload">
        </form>
    </body>
</html>