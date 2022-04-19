<?php
	session_start(); 
 ?>
<?php require_once("includes/connection.php");?>
<?php include("includes/permission.php");?>
<?php
	if (isset($_POST["btn_submit"])) {
		//lấy thông tin từ các form bằng phương thức POST
		$title = $_POST["title"];
		$content = $_POST["postcontent"];
		$is_public = 0;
		if (isset($_POST["is_public"])) {
			$is_public = $_POST["is_public"];
		}
		$hinhanh = $_POST["hinhanh"];
		$user_id = $_SESSION["user_id"];
		$category = $_POST["category"];
		$displaycontent = $_POST["displaycontent"];
		$sql = "INSERT INTO posts(title, content, user_id, is_public, createdate, updatedate ,hinhanh ,category,displaycontent) VALUES ( '$title', '$content', '$user_id', '$is_public', now(), now(),'$hinhanh','$category','$displaycontent')";
		// thực thi câu $sql với biến conn lấy từ file connection.php
		mysqli_query($conn,$sql);
		echo "Bài viết đã thêm thành công";
	}

?>
<style>
	
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
<?php include 'includes/bar.php'?>
<div class="add" style="width:1000px;margin:32px auto;margin-left:32px;">
<form action="them-bai-viet-ck.php" method="post">
		<table>
			<tr style="display:block;">
				<td colspan="2"><h3>Thêm bài viết mới</h3></td>
			</tr>	
			<tr>
				<td nowrap="nowrap">Tiêu đề bài viết :</td>
				<td><input type="text" id="title" name="title"></td>
			</tr>
			<tr>
				<td nowrap="nowrap">Ảnh Content (Link)</td>
				<td><input type="text" id="hinhanh" name="hinhanh"></td>			
			</tr>
			<tr>
				<td nowrap="nowrap">Display content</td>
				<td><input type="text" id="displaycontent" name="displaycontent"></td>			
			</tr>
			<tr>
				<td nowrap="nowrap">Thể loại</td>
				<td><select id="category" name="category" class="form-select" style="width:50%;">
						<option value="-1"></option>
						<option value="Công Nghệ" >Công Nghệ</option>
						<option value="Tin Game" >Tin Game</option>
						<option value="Xã Hội" >Xã Hội</option>
						<option value="Covid-19" >Covid-19</option>
					</select></td>
			</tr>
			<tr>
				<td nowrap="nowrap">Nội dung :</td>
				<td><textarea name="postcontent" id="postcontent" rows="10" cols="150"></textarea></td>
			</tr>
			<?php 
			if($_SESSION['permision']==1) {
			?>
			<tr>
				<td nowrap="nowrap">Public bài viết</td>
				<td><input style="display:inline-block;height:14px;width:16px;" type="checkbox" id="is_public" name="is_public" value="1"> public</td>
			</tr>
			<?php } ?>
			<tr>
			
			</tr>
			<tr>
				<td colspan="2" align="center"><input class="btn btn-danger" type="submit" name="btn_submit" value="Thêm bài viết"></td>
			</tr>

		</table>
		
	</form>
</div>
</body>
<script>
   CKEDITOR.replace( 'postcontent' );
</script>
