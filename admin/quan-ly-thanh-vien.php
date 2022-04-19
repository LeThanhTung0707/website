<?php
session_start();
?>
<?php require_once("includes/connection.php"); ?>
<?php include("includes/permission.php"); ?>
<?php
$server_username = "root"; // thông tin đăng nhập host
$server_password = ""; // mật khẩu, trong trường hợp này là trống
$server_host = "localhost"; // host là localhost
$database = 'website'; // database là website
$conn = mysqli_connect($server_host, $server_username, $server_password, $database)
	or die("không thể kết nối tới database"); ?>
<html>
<?php include 'includes/bar.php' ?>





</html>
<?php
$sql1="";
if (isset($_GET["id_delete"])) {
	$sql = "DELETE FROM users WHERE id_user = " . $_GET["id_delete"];
	mysqli_query($conn, $sql);
}

if (isset($_GET['q']) && !empty($_GET['q'])) {
	$keyword = $_GET['q'];
	$sql = "SELECT count(id_user) as total FROM users WHERE username LIKE '%$keyword%' or email LIKE '%$keyword%' or address LIKE '%$keyword%' ";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	$total_records = $row['total'];
	$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
	$limit = 6;
	$total_page = ceil($total_records / $limit);
	if ($current_page > $total_page) {
		$current_page = $total_page;
	} else if ($current_page < 1) {
		$current_page = 1;
	}
	$start = ($current_page - 1) * $limit;
	$sql1 = "SELECT * FROM users WHERE username LIKE '%$keyword%' or email LIKE '%$keyword%' or address LIKE '%$keyword%' LIMIT $start, $limit ";
} else {
	$sql = "SELECT count(id_user) as total FROM users order by id_user  ";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	$total_records = $row['total'];
	$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
	$limit = 6;
	$total_page = ceil($total_records / $limit);
	if ($current_page > $total_page) {
		$current_page = $total_page;
	} else if ($current_page < 1) {
		$current_page = 1;
	}
	$start = ($current_page - 1) * $limit;
	$sql1 = "SELECT * FROM users order by id_user LIMIT $start, $limit    ";
}

$query = mysqli_query($conn,$sql1);




if (!$query) echo 'Không có';
else {
?>

	<style>
		table {
			border-collapse: collapse;
		}

		td {
			white-space: nowrap;
		}

		td a {
			display: inline-block;
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

	<div class="add" style="width:800px;margin:32px auto;margin-left:32px;">
		<table class="search-form" cellpadding="10">
			<tr>
				<td>
					<form action="" method="GET" style="position:relative;">
						<input type="text" name="q" placeholder="Tìm " value="<?php
																				if (isset($_GET['q'])) {
																					echo $_GET['q'];
																				} ?>" />
						<button style="display:inline-block;height:calc(2rem + 6px);position:absolute;right:-40px;top:0;" class="ti-search btn btn-danger" type="submit"></button>
					</form>
				</td>
			</tr>
		</table>
		<div style="height:32px;"></div>
		<table class="table table-striped table-hover" border="1px;" align="center" style="width:76vw;">
			<thead>
				<tr>
					<td bgcolor="#E6E6FA">ID</td>
					<td bgcolor="#E6E6FA">Username</td>
					<td bgcolor="#E6E6FA">Email</td>
					<td bgcolor="#E6E6FA">Phone</td>
					<td bgcolor="#E6E6FA">Address</td>
					<td bgcolor="#E6E6FA">Trạng thái </td>
					<td bgcolor="#E6E6FA">Quyền</td>
					<td style="padding-left:20px;" bgcolor="#E6E6FA">Action</td>
				<tr>
			</thead>
			<tbody>
				<?php
				while ($data = mysqli_fetch_array($query)) {
					$i = 1;
					$id_user = $data['id_user'];
				?>
					<tr>
						<td><?php echo $id_user; ?></td>
						<td><?php echo $data['username']; ?></td>
						<td><?php echo $data['email']; ?></td>
						<td><?php echo $data['phone']; ?></td>
						<td><?php echo $data['address']; ?></td>
						<td><?php echo ($data['is_block'] == 1) ? "Bị khóa" : "Không bị khóa"; ?></td>
						<td><?php echo ($data['permision'] == 0) ? "Thành viên thường" : "Admin cấp ". $data['permision'] ." "; ?></td>
						<td>
							<button class="btn">
								<a href="chinh-sua-thanh-vien.php?id_user=<?php echo $id_user; ?>">
									<div class="ti-settings" style="color:blue;font-weight:800;"></div>
								</a>
							</button>
							<button class="btn"><a href="quan-ly-thanh-vien.php?id_delete=<?php echo $id_user; ?>">
									<div class="ti-trash" style="color:red;font-weight:800;"></div>
								</a></button>
						</td>
					</tr>
				<?php
					$i++;
				}
				?>
			</tbody>
		</table>

		<div class="pagination">

                <?php if ($current_page > 1 && $total_page > 1) {
                    echo '<a class="xemthem-prev btn btn-danger" style="margin-right:12px;" href="quan-ly-thanh-vien.php?page=' . ($current_page - 1) . '">Prev</a>  ';
                }
                // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
                if ($current_page < $total_page && $total_page > 1) {
                    echo '<a class="xemthem-next btn btn-danger" href="quan-ly-thanh-vien.php?page=' . ($current_page + 1) . '">Next</a>  ';
                } ?>


        </div>

	</div>



<?php } ?>
</div>
</body>