<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="../admin/css/dangnhap.css">
    <link rel="stylesheet" href="../admin/js/dangky.js">
	<title>Đăng nhập</title>
</head>
<?php
    session_start();
    require("config.php");
    if(isset($_POST["login"]))
    {
        $username = $_POST["username"];
        $pass1 = $_POST["pass1"];
        $sql = "select * from tbl_dangky where username = '$username' and pass1 = '$pass1'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)){
                $_SESSION["ten_dn"] = $username;
                header("location:category.php");
            }
        }
        else{
            echo "<h4 style='color:red;'>Sai tên đăng nhập hoặc mật khẩu</h4>";
        }
    }
?>

<script>
function togglePassword() {
	var upass = document.getElementById('pass1');
	var toggleBtn = document.getElementById('toggleBtn');
	if(upass.type == "password"){
		upass.type = "text";
		toggleBtn.value = "Hide Password";
	} else {
		upass.type = "password";
		toggleBtn.value = "Show Password";
	}
}
</script>

<form action="dangnhap.php" method="post">
    <table>
		<tr>
            <td colspan="2"><h3>Nhập thông tin để đăng nhập</h3></td>
		</tr>	
		<tr>
			<td>Tên đăng nhập:</td>
			<td><input type="text" name="username" id="username" required></td>
		</tr>
		<tr>
            <td>Mật khẩu:</td>
            <td><input id="pass1" type="password" name="pass1" required></td>
            <td><input id="toggleBtn" type="button" onclick="togglePassword()" value="Show Password"></td>	
		</tr>
		<tr>	
            <td colspan="2" align="center"><input type="submit" value="ĐĂNG NHẬP" name="login"></td>
		</tr>
	</table>
</form>

