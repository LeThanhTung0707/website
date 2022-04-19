<?php
session_start();
?>
<?php require_once("includes/connection.php"); ?>
<?php include("includes/permission.php"); ?>

<style>
	
	input {
		display: block;
		width: 400px;
		height: calc(2.25rem + 2px);
		padding: .375rem .75rem;
		font-size: 1rem;
		line-height: 1.5;
		color: #495057;
		background-color: #fff;
		background-clip: padding-box;
		border: 1px solid #ced4da;
		border-radius: .25rem;
		transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
		outline-color: red;
	}

	table {
		border-collapse: separate;
		border-spacing: 5em;
	}
	input[ type="checkbox"] {
		display: inline-block;
    	width: 32px;
    	height: 40px;
	}
	input[type="submit"] {
		width: 150px;
	}
	input[type="submit"]:hover {
		opacity: 1;
    -moz-transform: scale(1.02);
    -webkit-transform: scale(1.02);
    transform: scale(1.02);
	}
</style>
<?php include 'includes/bar.php' ?>
<div class="add" style="width:800px;margin:32px auto;margin-left:32px;">
	<?php
	if (isset($_POST["btn_submit"])) {
		//lấy thông tin từ các form bằng phương thức POST
		$username = $_POST["username"];
		$password = $_POST["password"];
		$name = $_POST["fullname"];
		$phone = $_POST["phone"];
		$address = $_POST["address"];
		$email = $_POST["email"];
		$permission = $_POST["permission"];
		$is_block = 0;
		if (isset($_POST["is_block"])) {
			$is_block = $_POST["is_block"];
		}

		if ($username == "" || $password == "" || $permission == "") {
			echo "Bạn cần điền đầy đủ thông tin !";
		} else {
			// Viết câu lệnh thêm thông tin người dùng
			$sql = "INSERT INTO users (username, password, fullname, phone , address , email, permision,  is_block, createdate) VALUES ('$username', '$password', '$name', '$phone' , '$address' ,'$email',  '$permission', '$is_block', now())";
			// thực thi câu $sql với biến conn lấy từ file connection.php
			$result = mysqli_query($conn, $sql);
			if (!$result) {
				echo "Người dùng đã tồn tại vui lòng không trùng username và email !";
			} else {
				header('Location: quan-ly-thanh-vien.php');
			}
		}
	}
	?>
	<form action="them-thanh-vien.php" method="post">
		<table>
			<tr style="display:block;">
				<td colspan="2">
					<h3>Thêm thành viên</h3>
				</td>
			</tr>
			<tr>
				<td nowrap="nowrap">Username :</td>
				<td><input require type="text" name="username" id="username" value=""></td>
			</tr>
			<tr>
				<td nowrap="nowrap">Mật khẩu :</td>
				<td><input require type="password" name="password" id="password" value=""></td>
			</tr>
			<tr>
				<td nowrap="nowrap">Họ tên :</td>
				<td><input require type="text" name="fullname" id="fullname" value=""></td>
			</tr>
			<tr>
				<td nowrap="nowrap">Số điện thoại :</td>
				<td><input require type="text" name="phone" id="phone" value=""></td>
			</tr>
			<tr>
				<td nowrap="nowrap">Địa chỉ :</td>
				<td><input require type="text" name="address" id="address" value=""></td>
			</tr>
			<tr>
				<td nowrap="nowrap">Địa chỉ email :</td>
				<td><input require type="text" id="email" name="email" value=""></td>
			</tr>
			<tr>
				<td nowrap="nowrap">Quyền :</td>
				<td>
					<select id="permission" name="permission" class="form-select" style="width:50%;">
						<option value="0">Thành viên thường</option>
						<option value="1">Admin cấp 1</option>
						<option value="2">Admin cấp 2</option>
					</select>
				</td>
			</tr>
			<tr>
				<td nowrap="nowrap">Block người dùng :</td>
				<td><input type="checkbox" id="is_block" name="is_block" value="1"></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input class="btn btn-danger" type="submit" name="btn_submit" value="Thêm thành viên"></td>
			</tr>

		</table>

	</form>
</div>
</div>

</body>