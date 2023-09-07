<?php
    require("config.php");
    
    //delete
    if(isset($_GET["task"])&&$_GET["task"]=="delete"){
        $cate_id = $_GET["id"];
        $sql = "delete from tbl_category where Cate_ID = ".$cate_id;
        if (mysqli_query($conn, $sql)) {
            header("location:category.php");
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
    </head>
    <body>
        <div class="container">
            <h1 style="text-align:center;">Trang cập nhật danh mục tin tức</h1>
            <div class="row">
                <form action="update_category.php" method="post">
                    <?php
                        if(isset($_GET["cate_id"])){
                            $cate_id = $_GET["cate_id"];
                            $sql = "select * from tbl_category where Cate_ID = $cate_id";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                while($row = mysqli_fetch_assoc($result)){
                                    echo "Nhập vào tên danh mục:";
                                    echo "<input value='".$row["Cate_Name"]."' class='form-control' type='text' name='cate_name'>";
                                    echo "Chọn trạng thái";
                                    echo "<select class='form-control' name='status'>";
                                    if($row["Status"]==1){
                                        echo "<option value='1'>Hiển thị</option>";
                                        echo "<option value='0'>Ẩn</option>";
                                    }
                                    else{
                                        echo "<option value='0'>Ẩn</option>";
                                        echo "<option value='1'>Hiển thị</option>";
                                        
                                    }
                                  
                                    echo "</select>";
                                }
                            }
                        }
                        

                    ?>
                    
                    
                    
                    
                    Nhập vào trạng thái:
                    <!-- <input class="form-control" type="text" name="status" id=""> -->
                    <input class="form-control" type="text" name="status" id="">
                    <br>
                    <!-- <input class="btn btn-primary" name="insert" type="submit" value="Cập nhật"> -->
                    <a class="btn btn-primary" href="update_category.php?t=u&i=">Cập nhật</a>
                    <a class="btn btn-danger" href="category.php">Hủy</a>
                </form>
            </div>
            
        </div>
    </body>
</html>