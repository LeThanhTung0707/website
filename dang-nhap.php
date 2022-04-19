<?php
session_start();
ob_start();
?>
<head>
	<title>Đăng Nhập - Web Tin Tức</title>
</head>
<?php include "includes/header.php" ?>

<?php
	//Gọi file connection.php ở bài trước
require_once("includes/connection.php");
	// Kiểm tra nếu người dùng đã ân nút đăng nhập thì mới xử lý

if (isset($_POST["btn_submit"])) {
		// lấy thông tin người dùng
	$username = $_POST["username"];
	$password = $_POST["password"];
		//làm sạch thông tin, xóa bỏ các tag html, ký tự đặc biệt 
		//mà người dùng cố tình thêm vào để tấn công theo phương thức sql injection
	$username = strip_tags($username);
	$username = addslashes($username);
	$password = strip_tags($password);
	$password = addslashes($password);
	if ($username == "" || $password =="") {
		echo "<script>alert('Username hoặc password bạn không được để trống!')</script>";
	}else{
		$sql = "select * from users where username = '$username' and password = '$password' ";
		echo $sql;
		
		$query = mysqli_query($conn,$sql);
		$num_rows = mysqli_num_rows($query);
		if ($num_rows==0) {
			echo "<script>alert('Tên đăng nhập hoặc mật khẩu không đúng !')</script>";
		}else{
			// Lấy ra thông tin người dùng và lưu vào session
			while ( $data = mysqli_fetch_array($query) ) {
	    		if($data["is_block"]==1) {
					echo "<script>alert('Tài khoản bị khóa')</script>";
				}
				else {
				$_SESSION["user_id"] = $data["id_user"];
				$_SESSION['username'] = $data["username"];
				$_SESSION["email"] = $data["email"];
				$_SESSION["fullname"] = $data["fullname"];
				$_SESSION["is_block"] = $data["is_block"];
				$_SESSION["permision"] = $data["permision"];
				header('Location: index.php');
				}
	    	}
			
		}
	}
}
ob_flush() ;
session_write_close();
?>
	
	<style>
		.login-back {
			margin:0;
			padding:0;
			background:url(./assets/img/pic1.jpg);
			background-size:cover;
			background-position:center;
			font-family:sans-serif;
			height: 100vh;
		}
		.loginbox {
			width: 320px;
			height:420px;
			background:#000;
			color:#fff;
			top:50%;
			left:50%;
			position: absolute;
			transform : translate(-50%,-50%);
			box-sizing:border-box;
			padding:70px,30px;
			align-items: center ;
			border-radius: 24px;
		}
		.avatar {
			width:100px;
			height:100px;
			border-radius:50%;
			position: absolute;
			top:-50px;
			left:33%;
			
		}
		h1{
			margin:0;
			padding:0 0 20px;
			text-align:center;
			font-size:22px;
		}
		.loginbox p{
			margin:0;
			padding:0;
			font-weight:bold;
			color:#fff;
		}
		.loginbox h1 {
			padding-top: 60px;
		}
		.loginbox .login-size {
			margin-left:auto;
			margin-right:auto;
			width:80%;
		}
		.loginbox input {
			width:100%;
			margin-bottom:50px;
		}
		.loginbox input[type="text"], input[type="password"]
		{
			border : none;
			border-bottom:1px solid #fff;
			background:transparent;
			outline:none;
			height:40px;
			color:#fff;
			font-size:16px;
			
			
			box-sizing :border-box;
		}
		.loginbox input[type="submit"]
		{
			border:none;
			outline:none;
			height:40px;
			background:#fb2525;
			color:#fff;
			font-size:18px;
			border-radius:20px;
		}
		.loginbox input[type="submit"]:hover {
			cursor:pointer;
			background:#ffc107;
			color:#000;
		}
		.loginbox a{
			text-decoration:none;
			font-size:12px;
			line-height:20px;
			color:darkgrey;
		}
		.login a:hover 
		{
			color:#ffc107;
		}
	</style>
	<div class="login-back">
	<div class="loginbox ">
    	<img src="./assets/img/avatar.png" class="avatar">
        <h1>ĐĂNG NHẬP</h1>
		<div class="login-size">
		<form method="POST" action="dang-nhap.php">
            <p>Username</p>
            <input required type="text" name="username" placeholder="Nhập Username">
            <p>Password</p>
            <input required type="password" name="password" placeholder="Nhập Mật khẩu">
            <input type="submit" name="btn_submit" value="Đăng Nhập">
		</form>
		</div>
        
    </div>
	</div>
  	

 <?php include "includes/footer.php" ?> 