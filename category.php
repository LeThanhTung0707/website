<?php require_once("includes/connection.php"); ?>
<?php include "includes/header.php" ?>

<div style="height:80px;"></div>
<?php
$category="";
if (isset($_GET["id_post"])) {
	$id = intval($_GET['id_post']);
	$sql1 = "select * from posts where id_post = $id";
	$query1 = mysqli_query($conn, $sql1);
	$data = mysqli_fetch_array($query1);
	$data["title"] = "";
	include "includes/breadcrumbs.php";
	$category = $data["category"];
	$sql = "select * from posts where category= '$category' order by updatedate desc ";
	$query = mysqli_query($conn, $sql);
}
else
if(isset($_GET["category"])) {
	$category = $_GET["category"];
	$sql = "select * from posts where category = $category ";
	$query = mysqli_query($conn, $sql);
	$data = mysqli_fetch_array($query);
	$sql = "select * from posts where category = $category order by updatedate desc";
	$query = mysqli_query($conn, $sql);
}

?>
<style>
	h3 {
		font-size: 15px;
		font-weight: 600;
		margin: 0;
	}

	strong {
		font-size: 13px;
		font-weight: 500;
		color: #777;
	}

	p {
		margin-bottom: 8px !important;

	}
</style>
<div class="list-content">
	<div class="col-third-2 list-content-66">
		<?php 
		$category = $data["category"];	
		if($category=="Công Nghệ") echo '<h1> Công Nghệ </h1>'; 
		else if($category=="Xã Hội") echo '<h1> Xã Hội </h1>'; 
		else if($category=="Covid-19") echo '<h1>Tình hình dịch bệnh </h1>';
		else echo '<h1> Tin Game </h1>';?>
		<div style="height:32px;"></div>
		<?php
		while ($data1 = mysqli_fetch_array($query)) {
		?>
			<?php
			
			echo '
					<div class="list-content-nd">
					<a href="display.php?id_post=' . $data1["id_post"] . '">
						<img class=image src="' . substr($data1["hinhanh"], 0, 1000000) . '" alt="" height="150px" width="218px">
						<div class="list-content-cd">
							<h3>' . $data1["title"] . '</h3>
							<h4> ' . date('d-m-Y',strtotime($data["createdate"]))  .' </h4>
							<p class="list-content-p">
							<p>' . substr($data1["displaycontent"], 0, 3000) . ' ...</p>
							</p>
						</div>
						<div class="clear"></div>
						</a>
					</div>
            	';
			// }
			?>
		<?php
		}
		?>
	</div>
	<?php if($category!=="Covid-19" )
	 include "includes/sidebar.php" ?>
</div>
<div class="clear"></div>
</div>
<?php include "includes/footer.php" ?>