<?php
session_start();
?>

<?php include("includes/permission.php"); ?>
<?php include("includes/header.php"); ?>
<?php
if (isset($_POST["btn_submit"])) {
	$name = $_POST["fullname"];
	$email = $_POST["email"];
	$phone = $_POST["phone"];
	$address = $_POST["address"];
	$permission = $_POST["permission"];
	$is_block = 0;
	if (isset($_POST["is_block"])) {
		$is_block = $_POST["is_block"];
	}

	$id_user = $_POST["id_user"];
	$sql = "UPDATE users SET fullname = '$name', email = '$email', phone = '$phone', address = '$address', permision = '$permission', is_block = '$is_block' WHERE id_user=$id_user";
	mysqli_query($conn, $sql);
	header('Location: quan-ly-thanh-vien.php');
}

$id_user = -1;
if (isset($_GET['id_user'])) {
	$id_user = $_GET['id_user'];
}
$sql = "SELECT * FROM users WHERE id_user = " . $id_user;
$query = mysqli_query($conn, $sql);

function make_permission_dropdown($id)
{
	$select_1 = "";
	$select_2 = "";
	$select_3 = "";
	if ($id == 0) {
		$select_1 = 'selected = "selected"';
	}
	if ($id == 1) {
		$select_2 = 'selected = "selected"';
	}
	if ($id == 2) {
		$select_3 = 'selected = "selected"';
	}
	$select = '<select id="permission" name="permission">
						<option value="-1"></option>
						<option value="0" ' . $select_1 . '>Thành viên thường</option>
						<option value="1" ' . $select_2 . '>Admin cấp 1</option>
						<option value="2" ' . $select_3 . '>Admin cấp 2</option>
					</select>';
	return $select;
}


?>
<?php
while ($data = mysqli_fetch_array($query)) {
	$i = 1;
	$id_user = $data['id_user'];
	$is_block = "";
	if ($data['is_block'] == 1) {
		$is_block = "checked='checked'";
	}
?>

	<?php include 'includes/bar.php' ?>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<style>
		.add {
			font-family: 'Playfair Display', serif;
		}

		input {
			display: block;
			width: 700px;
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
	<div class="add" style="width:1000px;margin:32px auto;margin-left:32px;">
		<form action="chinh-sua-thanh-vien.php" method="post">
			<table>
				<tr>
					<td colspan="2">
						<h3>Chỉnh sửa thông tin thành viên</h3>
						<input type="hidden" name="id_user" value="<?php echo $id_user; ?>">
					</td>
				</tr>
				<tr>
					<td nowrap="nowrap">Họ tên :</td>
					<td><input name="fullname" id="fullname" value="<?php echo $data['fullname']; ?>"></td>
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
					<td nowrap="nowrap">Quyền :</td>
					<td>
						<?php echo make_permission_dropdown($data['permision']); ?>
					</td>
				</tr>
				<tr>
					<td nowrap="nowrap">Block người dùng :</td>
					<td><input style="display:inline-block;height:14px;width:40px;" type="checkbox" id="is_block" name="is_block" value="1" <?php echo $is_block; ?>></td>
				</tr>
				<tr>
					<td colspan="2" align="center"><input class="btn btn-danger" type="submit" name="btn_submit" value="Cập nhật thông tin"></td>
				</tr>

			</table>

		</form>
	<?php } ?>
	