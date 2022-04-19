<?php require_once("includes/connection.php"); ?>
<?php session_start(); ?>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>
<link rel="shotcut icon" href="https://news.gearvn.com/wp-content/uploads/2020/03/LogoGNews-01-300x105.png" type="image/x-icon">
<style>
	p {
		display: block !important;
	}
</style>

<?php
if(isset($_POST["btn_submit"])) {
	
	$id_user = $_SESSION["user_id"];
	$id_postt = $_GET["id_post"];
	$name = $_SESSION["username"];
	$content = $_POST["content"];
	if($content=="") 
	{
		echo "<script>alert('Nội Dung Bình Luận không được để trống')</script>";
		
	}
		else{
	$truyvan = "INSERT INTO comments(id_post,id_user,name,content,submit_date) VALUE ('$id_postt','$id_user','$name','$content',now())";
	mysqli_query($conn,$truyvan);  }
}


if (isset($_GET["id_post"])) {
	$id_post = intval($_GET['id_post']);
}
$sql = "select * from posts where id_post = $id_post";
$query = mysqli_query($conn, $sql);
?>

<?php
while ($data = mysqli_fetch_array($query)) {

?>

	<head>
		<title><?php echo $data['title']; ?></title>
	</head>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js" type="text/javascript"></script>
	<?php
	include "includes/header.php" ?>
	<?php include "includes/breadcrumbs.php" ?>

	<div class="list-content" style='  width:1068px;margin-left:auto;margin-right:auto;margin-bottom:80px;margin-top:10px;'>
		<div class="list-66-header animate__animated animate__fadeInDown">
			<img class="image" src="<?php echo $data['hinhanh']; ?>" alt="">
			<div class="text-content">
				<h3><?php echo $data['title']; ?></h3>
			</div>
		</div>
		<div class="col-third-2 list-content-66">
			<i> Ngày tạo : <?php echo $data['createdate']; ?></i>
			<i>- Lượt xem : <?php echo $data['view']; ?></i>
			<p><?php echo $data['content']; ?></p>
			<?php include "includes/comment.php"?>
			<div class="fb-comments" 
			data-href="http://localhost/web/website/display.php?id_post=<?php echo $id_post;?>" d
			ata-width="500" data-numposts="5"></div>
		</div>
		<?php  include "includes/sidebar.php" ?>
	</div>
	<?php if (isset($_SESSION['username'])) : ?>
		<?php if ($_SESSION['permision'] == 1) : ?>
			<form action="/web/website/admin/quan-ly-bai-viet.php" method="get">
				<input type="hidden" name="id_edit" value=" <?php echo $id_post ?>">
				<input type="submit" value="Sửa bài viết">
			</form>
		<?php endif ?>
	<?php endif ?>
	<?php
	break;
	?>
<?php }
$id_post = $_GET["id_post"];
$sql = 'UPDATE posts SET view = view + 1 WHERE id_post = ' . $id_post . '';
mysqli_query($conn,$sql);
?>
</div>


<script>
	var content1 = document.querySelector('.list-content .list-content-66');
	var content1H = content1.offsetHeight - 200;
	content1HH = content1H.toString() + 'px';
	var content2 = document.querySelector('.list-content .list-content-33 ');
	content2.style.setProperty('height', content1HH);
</script>
</main>

<?php include "includes/footer.php" ?>