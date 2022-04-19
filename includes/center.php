<div class="list-content">
			<div class="col-third-2 list-content-66">
				<?php
				if (isset($_GET['q']) && !empty($_GET['q'])) {
					$keyword = $_GET['q'];
					echo "Kết quả tìm kiếm cho $keyword" ;
					$sql = "SELECT * FROM posts WHERE title LIKE '%$keyword%' or content LIKE '%$keyword%' ";
					$sql = "SELECT * FROM posts WHERE title LIKE '%$keyword%' or content LIKE '%$keyword%' or category like '%$keyword%' ";
				} else {
					$sql = "select * from posts where is_public = 1 order by rand()  ";
				}
				$count=0;
				$query = mysqli_query($conn,$sql);
				while ($data = mysqli_fetch_array($query))
				{ ?>
					<?php
							$count += 1;
							if ($count == 5) {
								break;
							}
				echo '	
				<div class="list-content-nd">
				<a href="display.php?id_post=' . $data["id_post"] . '">
					<img class=image src="' . substr($data["hinhanh"], 0, 1000000) . '" alt="" height="150px" width="218px">
					<div class="list-content-cd">
						<h3>' . $data["title"] . '</h3>
						<h4> ' . date('d-m-Y',strtotime($data["createdate"]))  .' </h4>
						<p class="list-content-p">
							<p>' . substr($data["displaycontent"], 0, 3000) . ' </p>
						</p>
					</div>
					<div class="clear"></div>
				</a>
				</div>
            	';
				?>
				<?php
				}
				if ($count == 0 ) echo '<br> Không có kết quả';
				?>
				
				<a class="xemthem" href="ketqua.php">Xem thêm</a>
			</div>
			<?php include "includes/sidebar.php" ?>
			</div>
			<div class="clear"></div>
		</div>