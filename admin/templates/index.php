
<?php
    //comment trên 1 dòng
    /*comment trên nhiều dòng */
    //$ten = "nguyễn văn A";
    //echo "<h1 style='color:red;'>Xin chào " . $ten . "</h1>";
    //include("config.php");
    require("config.php");
    if(isset($_POST["insert"]))
    {
        $cate_id = $_POST["cate_id"];
        $title = $_POST["title"];
        $description = $_POST["noidung"];
        $date = $_POST["date"];
        $author = $_POST["author"];
        $status = $_POST["status"];
        //$cate_id = $_POST["cate_id"];
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
                $sql = "insert into tbl_news(Cate_ID, Title, Intro_Image, Author, Post_Date, Description, Status) values($cate_id,N'$title','$target_file',N'$author','$date',N'description',$status)";
                if (mysqli_query($conn, $sql)) {
                    header("location:index.php");
                    echo "New record created successfully";
                  } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                  }
            }
            else{
                echo "lỗi upload file";
            }
        }
    }
    if(isset($_GET["task"])&&$_GET["task"]=="delete"){
        $news_id = $_GET["id"];
        $sql = "delete from tbl_news where News_ID = ".$news_id;
        if (mysqli_query($conn, $sql)) {
            header("location:index.php");
            echo "New record created successfully";
          } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
          }
    }
?>
<html>
    <head>
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
        <script src="https://cdn.ckeditor.com/4.19.1/standard/ckeditor.js"></script>

    </head>
    <body>
        <div class="container">
            <h1 style="text-align:center;">Trang quản trị tin tức</h1>
            <div class="row">
                <form action="index.php" method="post" enctype="multipart/form-data">
                    Nhập vào tên danh mục:
                    <select class="form-control" name="cate_id" id="">
                        <?php
                            $sql = "select * from tbl_category order by Cate_ID DESC";
                            $result = mysqli_query($conn,$sql);
                            if (mysqli_num_rows($result) > 0) 
                            {
        
                                // output data of each row
                                while($row = mysqli_fetch_assoc($result)) 
                                {
                                    echo "<option value='".$row["Cate_ID"]."'>".$row["Cate_Name"]."</option>";
                                }
                            }
                        ?>
                        
                    </select>
                    <br>
                    Nhập vào tiêu đề tin:
                    <input type="text" name="title" id="" class="form-control">
                    <br>
                    Chọn hình ảnh đại diện:
                    <input type="file" name="img" id="" class="form-control">
                    <br>
                    Chọn ngày đăng:
                    <input type="date" name="date" id="" class="form-control">
                    <br>
                    Nhập vào nội dung tin:
                    <textarea name="content" id="" cols="30" rows="10" class="form-control"></textarea>
                    <script>
                        CKEDITOR.replace( 'content' );
                    </script>
                    <br>
                    Nhập vào trạng thái:
                    <input class="form-control" type="text" name="status" id="">
                    <br>
                    <input class="btn btn-primary" type="submit" name="insert" value="Thêm mới">
                    <br>
                    <br>
                    Nhập vào tiêu đề tin:
                    <input type="text" name="search" class="form-control" id="">
                    <br>
                    <input type="submit" value="Tìm kiếm" name="btn_search" class="btn btn-danger">
                </form>
            </div>
            <div class="row">
            <table class="table table-striped">
                    <tr>
                        <th>Danh mục</th>
                        <th>Tiêu đề tin</th>
                        <th>Ảnh</th>
                        <th>Ngày đăng</th>
                        <th>Người đăng</th>
                        <th>Nội dung</th>
                        <th>Trạng thái</th>
                        <th>Hành động</th>
                    </tr>
                    <?php
                        $sql = "";
                        if(isset($_POST["btn_search"])){
                            $search = $_POST["search"];
                            $sql = "select * from tbl_news where Title like '%$search%' order by News_ID DESC";
                        }
                        else
                        {
                            $sql = "select * from tbl_news order by News_ID DESC";
                        }
                        
                        $result = mysqli_query($conn,$sql);
                        if (mysqli_num_rows($result) > 0) 
                        {
    
                            // output data of each row
                            while($row = mysqli_fetch_assoc($result)) 
                            {
                                echo "<tr>";
                                echo "<td>".$row["Cate_ID"]."</td>";
                                echo "<td>".$row["Title"]."</td>";
                                echo "<td><img width='300px;' src='".$row["Intro_Image"]."'></td>";
                                echo "<td>".$row["Description"]."</td>";
                                echo "<td>".$row["Post_Date"]."</td>";
                                echo "<td>".$row["Author"]."</td>";
                                if($row["Status"] == 1){
                                    echo "<td>Hiển thị</td>";
                                }
                                else{
                                    echo "<td>Ẩn</td>";
                                }
                                
                                echo "<td>";
                                echo "<a class='btn btn-warning' href='update_news.php?task=update&id=".$row["Cate_ID"]."'>Sửa</a>";
                                echo "<a class='btn btn-danger' href='index.php?task=delete&id=".$row["News_ID"]."'>Xóa</a>";
                                echo "</td>";
                                echo "</tr>";
                                
                            }
                        } 
                        else 
                        {
                            echo "0 results";
                        }
                    ?>
                    
                </table>
            </div>
        </div>
    </body>
</html>