<html>
<head>
    <link rel="stylesheet" href="../admin/css/dangky.css">
    <link rel="stylesheet" href="../admin/js/dangky.js">
	<title>Đăng ký</title>
</head>
<body>
<?php
		require("config.php");
		if (isset($_POST["btn_submit"])) {
  			//lấy thông tin từ các form bằng phương thức POST
  			$username = $_POST["username"];
  			$pass1 = $_POST["pass1"];
			$pass2 = $_POST["pass2"];
 			$name = $_POST["name"];
            $email = $_POST["email"];
            $phone = $_POST["phone"];
  			//Kiểm tra điều kiện bắt buộc đối với các field không được bỏ trống
			  if ($username == "" || $pass1 == "" ||  $pass2 == "" || $name == "" || $email == "" || $phone == "") {
				   echo "Bạn vui lòng nhập đầy đủ thông tin";
  			}else{

  			// Kiểm tra email đã tồn tại chưa
  			$sql = " select * from tbl_dangky where username = '$username' ";
			$kt = mysqli_query($conn, $sql);
			if(mysqli_num_rows($kt)  > 0){
				echo "Tên đăng nhập đã tồn tại";
			}else{

            // Kiểm tra email đã tồn tại chưa
  			$sql = " select * from tbl_dangky where email = '$email' ";
              $kt = mysqli_query($conn, $sql);
              if(mysqli_num_rows($kt)  > 0){
                  echo "Email đã tồn tại";
              }else{

            //kiểm tra xem 2 mật khẩu có giống nhau hay không:
			if($pass1 != $pass2){
				echo"LỖI!!"," Mật khẩu không trùng khớp!", " Đăng ký không thành công!";
			}
			else{
				$pass = md5($pass1);
                $sql = "INSERT INTO tbl_dangky (username, pass1, pass2, name)
					values ('$username','$pass1','$pass2', '$name')";
				if (mysqli_query($conn, $sql)) {
                    header("location:demo.php");
                    echo "Bạn đã đăng ký thành công!";
                  } else {
                    echo "LỖI!";
                  }		
			}
            if (condition) {
                # code...
            } else {
                # code...
            }
              }
        }
        }
	}
    
?>

<form action="dangky.php" method="post">
		<table>
			<tr>
                <td colspan="2"><h3>Nhập thông tin để đăng ký tài khoản</h3></td>
			</tr>	
			<tr>
				<td>Tên đăng nhập:</td>
				<td><input type="text" id="username" name="username" required></td>
			</tr>
			<tr>
                <td>Mật khẩu:</td>
                <td><input type="password" id="pass1"  name="pass1" required></td>
                <td><input id="toggleBtn" type="button" onclick="togglePassword()" value="Show Password"></td>
			</tr>
            <tr>
				<td>Nhập lại mật khẩu:</td>
				<td><input type="password" id="pass2" name="pass2" required></td>
                <td><input id="toggleBtn" type="button" onclick="togglePassword()" value="Show Password"></td>
			</tr>
			<tr>
				<td>Họ và tên:</td>
				<td><input type="text" id="name" name="name" required></td>
			</tr>
            <tr>
				<td>Email:</td>
				<td><input type="email" id="email" name="email" required></td>
			</tr>
            <tr>
				<td>Số điện thoại:</td>
				<td><input type="number" id="phone" name="phone" required></td>
			</tr>
			<tr>	
                <td colspan="2" align="center"><button type="btn_submit" class="btn_submit">ĐĂNG KÝ</button>
			</tr>
		</table>
</form>
</body>
</html>
