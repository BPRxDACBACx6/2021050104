<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../admin/css/index.css">
    <title>PHP</title>
</head>
<body>

<?php
    require("config.php");
    $sql = "select * from tbl_category";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)){
            echo "<a href='index.php?cate_id=".$row["Cate_ID"]."'>".$row["Cate_Name"]."</a> | ";
        }
    }
    else{
        echo "không có dữ liệu trong bảng";
    }
    if(isset($_GET["cate_id"]) && $_GET["cate_id"]!=""){
        $sql_news = "select * from tbl_news where Cate_ID = ".$_GET["cate_id"];
        $result = mysqli_query($conn, $sql_news);
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)){
                echo "<br/>";
                echo "<img width='200px;' height='200px;' src='".$row["Intro_Image"]."'>";
                echo "" . $row["Title"];
                echo "<br/>";
            }
        }
        else{
            echo "<br/>";
            echo "Không có dữ liệu trong bảng";
        }
    }
?>

<?php
require("pt.php");
?>

</body>
</html>
