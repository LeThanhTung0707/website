<?php
session_start();
?>
<?php require_once("includes/connection.php"); ?>
<?php include("includes/permission.php"); ?>
<?php include("includes/header.php"); ?>

<?php
if (isset($_POST["btn_edit"])) {
	//lấy thông tin từ các form bằng phương thức POST
	$title = $_POST["title"];
	$id_edit = $_POST["id_edit"];
	$content = $_POST["postcontent"];
	$category = $_POST["category"];
	$is_public = 0;
	if (isset($_POST["is_public"])) {
		$is_public = $_POST["is_public"];
	}

	$user_id = $_SESSION["user_id"];
	$displaycontent = $_POST["displaycontent"];
	$sql = "UPDATE posts SET title='$title', content='$content',category='$category', user_id='$user_id', is_public='$is_public', updatedate = now() , displaycontent='$displaycontent' where id_post='$id_edit'";
	// thực thi câu $sql với biến conn lấy từ file connection.php
	mysqli_query($conn, $sql);
	header('Location: /web/website/admin/danh-sach-bai-viet.php');
}

?>
<?php include 'includes/bar.php' ?>
<style>
	
	input {
		display: inline-block;
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
	input[ type="checkbox"] {
		display: inline-block;
    	width: 15px;
    	height: 16px;
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
	<form action="quan-ly-bai-viet.php" method="post">
	<table>
	<tr style="display:block; width:207px">
		<td colspan="2"><h3>Sửa Bài Viết</h3></td>
	</tr>
	<?php
	if (isset($_GET["id_edit"])) {
		$id_edit = $_GET["id_edit"]; } else $id_edit=$_POST["id_edit"];
		$sql = "select * from posts where id_post = $id_edit";
		$query = mysqli_query($conn, $sql);

		function make_category_dropdown($id)
		{
			$select_1 = "";
			$select_2 = "";
			$select_3 = "";
			$select_4 = "";
			if ($id == 'Công Nghệ') {
				$select_1 = 'selected = "selected"';
			}
			if ($id == 'Tin Game') {
				$select_2 = 'selected = "selected"';
			}
			if ($id == 'Xã Hội') {
				$select_3 = 'selected = "selected"';
			}
			if ($id == 'Covid-19') {
				$select_4 = 'selected = "selected"';
			}
			$select = '<select id="category" name="category">
					<option value="-1"></option>
					<option value="Công Nghệ" ' . $select_1 . '>Công Nghệ</option>
					<option value="Tin Game" ' . $select_2 . '>Tin Game</option>
					<option value="Xã Hội" ' . $select_3 . '>Xã Hội</option>
					<option value="Covid-19" ' . $select_4 . '>Covid-19</option>
				</select>';
			return $select;
		}
	

	if (isset($_GET["id_delete"])) {
		// var_dump($_POST);
		$id_delete = $_GET["id_delete"];
		$sql = "DELETE FROM posts WHERE id_post = $id_delete";
		// var_dump($sql);
		mysqli_query($conn, $sql);
		header("Location: /website/index.php");
	} ?>
	
	<?php	
	$i = 0;
	while ($data = mysqli_fetch_array($query)) {
	?>
		<tr>
			<td nowrap="nowrap">Tiêu đề bài viết :</td>
			<td><input type="text" id="title" name="title" value="<?php echo $data["title"]; ?>"></td>
		</tr>

		<tr>
			<td nowrap="nowrap">Display Content</td>
			<td><input type="text" id="displaycontent" name="displaycontent" value="<?php echo $data["displaycontent"]; ?>"></td>
		</tr>
		<tr>
			<td nowrap="nowrap">Category</td>
			<td>
				<?php echo make_category_dropdown($data["category"]);  ?>
			</td>
		</tr>
		<tr>
			<td nowrap="nowrap">Nội dung :</td>
			<td><textarea name="postcontent" id="postcontent" rows="10" cols="150"><?php echo $data["content"]; ?></textarea></td>
		</tr>
		<?php 
			if($_SESSION['permision']==1) {
			?>
		<tr>
			<td nowrap="nowrap">Public bài viết ? :</td>
			<td><input type="checkbox" id="is_public" name="is_public" value="1"></td>
		</tr>
		<?php } ?>
		<tr>
			<td onclick="okluon()" colspan="2" align="center"><input class="btn btn-danger" type="submit" name="btn_edit" value="Sửa bài viết">
			</td>

			<input type="hidden" name="id_edit" value="<?php echo $data["id_post"]; ?>">
		</tr>

	<?php
	}
	?>
</table>
</form>
</div>

<script>
	CKEDITOR.replace( 'postcontent' );

	function okluon() {
		alert('Sửa thành công');
	}
</script>
