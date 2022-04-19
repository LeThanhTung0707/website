<head>
	<title>Đăng Kí - Web Tin Tức</title>
</head>
<?php include "includes/header.php" ?>
<?php require_once("includes/connection.php"); ?>
<?php
if (isset($_POST["btn_submit"])) {
	//lấy thông tin từ các form bằng phương thức POST
	$username = $_POST["username"];
	$password = $_POST["pass"];
	$name = $_POST["name"];
	$email = $_POST["email"];
	//Kiểm tra điều kiện bắt buộc đối với các field không được bỏ trống
	if ($username == "" || $password == "" || $name == "" || $email == "") {
		echo "<script>alert('Bạn Vui Lòng Nhập Đầy Đủ Thông Tin !')</script>";
	} else {
		$sql = "INSERT INTO users(username, password, fullname, email, createdate ) VALUES ( '$username', '$password', '$name', '$email', now())";
		// thực thi câu $sql với biến conn lấy từ file connection.php
		mysqli_query($conn, $sql);
		echo "<script>alert('chúc mừng bạn đã đăng ký thành công !')</script>";
		header('Location: /web/website/dang-nhap.php');
		die();
	}
}

?>
<div style="height:80px"></div>



<style>
	.login-back {
		margin: 0;
		padding: 0;
		background: url(./assets/img/pic1.jpg);
		background-size: cover;
		background-position: center;
		font-family: sans-serif;
		height: 100vh;
	}

	.loginbox {
		width: 320px;
		background: #000;
		color: #fff;
		top: 60%;
		left: 50%;
		position: absolute;
		transform: translate(-50%, -50%);
		box-sizing: border-box;
		padding: 70px, 30px;
		align-items: center;
		border-radius: 24px;
	}

	.avatar {
		width: 100px;
		height: 100px;
		border-radius: 50%;
		position: absolute;
		top: -50px;
		left: 33%;

	}

	h1 {
		margin: 0;
		padding: 0 0 20px;
		text-align: center;
		font-size: 22px;
	}

	.loginbox p {
		margin: 0;
		padding: 0;
		font-weight: bold;
		color: #fff;
	}

	.loginbox h1 {
		padding-top: 60px;
	}

	.loginbox .login-size {
		margin-left: auto;
		margin-right: auto;
		width: 80%;
	}

	.loginbox input {
		width: 100%;
		margin-bottom: 24px;
	}

	.loginbox input[type="text"],
	input[type="password"] {
		border: none;
		border-bottom: 1px solid #fff;
		background: transparent;
		outline: none;
		height: 40px;
		color: #fff;
		font-size: 16px;


		box-sizing: border-box;
	}

	.loginbox input[type="submit"] {
		border: none;
		outline: none;
		height: 40px;
		background: #fb2525;
		color: #fff;
		font-size: 18px;
		border-radius: 20px;
	}

	.loginbox input[type="submit"]:hover {
		cursor: pointer;
		background: #ffc107;
		color: #000;
	}

	.loginbox a {
		text-decoration: none;
		font-size: 12px;
		line-height: 20px;
		color: darkgrey;
	}

	.login a:hover {
		color: #ffc107;
	}
</style>

<div class="login-back">
	<div class="loginbox">
		<img src="./assets/img/avatar.png" class="avatar">
		<h1>ĐĂNG KÝ</h1>
		<div class="login-size">
			<form method="POST" action="dang-ky.php">
				<p>Username</p>
				<input required type="text" id="username" name="username" placeholder="Nhập Username">
				<p>Password</p>
				<span><input required type="password" id="pass" name="pass" placeholder="Nhập Mật Khẩu"></span>
				<span><input style="display:inline-block;width:10%;" type="checkbox" name="" id="" onclick = "showpassWord()">Hiện mật khẩu</span>
				<p>Họ Tên</p>
				<input required type="text" id="name" name="name" placeholder="Nhập Họ Tên">
				<p>Email</p>
				<input  type="text" id="emais" name="email" placeholder="Nhập Email">
				<a href="index.php"> <input type="submit" name="btn_submit" value="Đăng Ký">
				</a>
			</form>
		</div>
	</div>
</div>


<script>
function showpassWord() {
	var x = document.getElementById('pass');
	if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
<!--  -->
<?php include "includes/footer.php" ?>