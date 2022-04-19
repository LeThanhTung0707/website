<?php include("includes/header.php"); ?>

<?php
if (isset($_POST["btn_submit"])) {
	//lấy thông tin từ các form bằng phương thức POST
	$fullname = $_POST["fullname"];
	$password = $_POST["password"];
	$phone = $_POST["phone"];
	$email = $_POST["email"];
	$address = $_POST["address"];
	$id_user = $_POST["id_user"];
	$sql = "UPDATE users SET fullname='$fullname',password='$password', phone='$phone', email='$email', address='$address' WHERE id_user=$id_user";
	// thực thi câu $sql với biến conn lấy từ file connection.php
	mysqli_query($conn, $sql);
	echo "<script>alert('Cập nhật thông tin thành công!')</script>";
}

$id_user = -1;
if (isset($_GET['id_user'])) {
	$id_user = $_GET['id_user'];
}
$sql = "SELECT * FROM users WHERE id_user = " . $id_user;
$query = mysqli_query($conn, $sql);
?>
<?php
$data = mysqli_fetch_array($query);
	$i = 1;
	$id_user = $data['id_user'];
?>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="/web/website/assets/css/style1.css">

	<body>
		<div style="background: #F1F3FA;">
			<div class="container">
				<div class="row profile">
					<div class="col-md-3">
						<div class="profile-sidebar">
							<div class="profile-userpic">
								<img src="https://i.pinimg.com/originals/51/f6/fb/51f6fb256629fc755b8870c801092942.png" alt="">
							</div>
							<div class="profile-usertitle">
								<div class="profile-usertitle-name">
									Marcus Doe
								</div>
								<div class="profile-usertitle-job">
									Developer
								</div>
							</div>
							<div class="profile-userbuttons">
								<button type="button" class="btn btn-success btn-sm">Follow</button>
								<button type="button" class="btn btn-danger btn-sm">Message</button>
							</div>
							<div class="profile-usermenu">
								<ul class="nav">
									<li id="overview" class="active" onclick="hiden()">
										<a href="#">
											<i class="glyphicon glyphicon-home"></i>
											Overview </a>
									</li>
									<li id="account" class="" onclick="hiden()">
										<a href="#">
											<i class="glyphicon glyphicon-user"></i>
											Account Settings </a>
									</li>
									
								</ul>
							</div>
						</div>
					</div>
					<div class="col-md-9 main-profile">
						<div class="profile-content overview">			 					
						</div>
						<div class="profile-content account-settings">
							<form action="canhan.php" method="post">
								<table>
									<tr>
										<td colspan="2">
											<h3>Chỉnh sửa thông tin cá nhân</h3>
											<input type="hidden" name="id_user" value="<?php echo $id_user; ?>">
										</td>
									</tr>
									<tr>
										<td nowrap="nowrap">Họ tên :</td>
										<td><input name="fullname" id="fullname" value="<?php echo $data['fullname']; ?>"></td>
									</tr>
									<tr>
										<td nowrap="nowrap">Password</td>
										<td><input type="password" id="password" name="password" value="<?php echo $data["password"]; ?>"></td>
									</tr>
									<tr>
										<td nowrap="nowrap">Địa chỉ email :</td>
										<td><input type="text" id="email" name="email" value="<?php echo $data['email']; ?>"></td>
									</tr>
									<tr>
										<td nowrap="nowrap">Số điện thoại :</td>
										<td><input type="text" id="phone" name="phone" value="<?php echo $data['phone']; ?>"></td>
									</tr>
									<tr>
										<td nowrap="nowrap">Địa chỉ :</td>
										<td><input type="text" id="address" name="address" value="<?php echo $data['address']; ?>"></td>
									</tr>
									<tr>
										<td colspan="2" align="center"><input type="submit" name="btn_submit" value="Cập nhật thông tin"></td>
									</tr>

								</table>

							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
<script>
	function hiden() {
		doc
	}
</script>



<?php include "includes/footer.php" ?>