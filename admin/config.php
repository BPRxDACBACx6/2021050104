<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "06_humg";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password,$db);

    // Check connection
    if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    }
    echo "";

    $sql = "select * from tbl_category order by Cate_ID DESC";
    $result = $conn->query($sql);
?>

