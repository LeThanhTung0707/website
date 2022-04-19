<div class="container">
	<?php
	$sql = "select * from posts where is_public = 1 order by createdate  desc ";
	$query = mysqli_query($conn, $sql);
	?>
	<?php
	
	$count = 0;
	while ($data = mysqli_fetch_array($query)) {
	?>
		<?php
		$count += 1;
		if ($count > 1) {
			break;
		}
		
		echo '
			<div class="main-content animate__animated animate__fadeInDown">
				<a href="display.php?id_post=' . $data["id_post"] . '">
					<img src="' . substr($data["hinhanh"], 0, 1000000) . '" alt="">					
					<div class="text-content">
						<h3><b>' . substr($data["title"], 0, 300) . ' ...</b>
						</h3>
						<h4> Ngày Tạo - <span style = "color:white;font-weight:400;" > ' . date('d-m-Y',strtotime($data["createdate"]))  .' </span></h4>
					</div>			
				</a>	
			</div>'
		?>
	<?php } ?>
		<?php
		$count += 1;
		if ($count > 1) {		
		}
		echo '
			<div class="sub-content animate__animated animate__fadeInDown ">
				<a href="display.php?id_post=' . $data["id_post"] . '">
					<img src="' . substr($data["hinhanh"], 0, 1000000) . '" alt="">
					<div class="text-content">
						<h3><b>' . substr($data["title"], 0, 100) . ' ...</b>
						</h3>
						<h4> Ngày Tạo - <span style = "color:white;font-weight:400;" > ' . date('d-m-Y',strtotime($data["createdate"]))  .' </span></h4>
					</div>
				</a>			
			</div>'
		?>
	<?php
	$count = 0;
	while ($data = mysqli_fetch_array($query)) {
	?>
		<?php
		$count += 1;
		if ($count > 1) {
			break;
		}
		echo '
			<div style="margin-left: 2%;" class="sub-content animate__animated animate__fadeInDown ">
				<a href="display.php?id_post=' . $data["id_post"] . '">
					<img src="' . substr($data["hinhanh"], 0, 1000000) . '" alt="">
					<div class="text-content">
					<h3><b>' . substr($data["title"], 0, 100) . ' ...</b>
					</h3>
					<h4> Ngày Tạo - <span style = "color:white;font-weight:400;" > ' . date('d-m-Y',strtotime($data["createdate"]))  .' </span></h4>
					</div>
				</a>
			</div>
		<div class="clear"></div>'
		?>
	<?php } ?>
	<div style=" padding-top: 16px;padding-bottom: 16px;"> </div>
    <?php include "includes/slide.php" ?>
    <?php include "includes/center.php" ?>
</div>

