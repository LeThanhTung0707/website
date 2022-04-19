


 <div class="col-third list-content-33">
                <div class="stic">
                    <div class="list-title">
                        <div class="block-title">Tin Covid-19</div>
                    </div>
                    <div class="list-subcontent-nd">
                    <?php
						$sql = "select * from posts where category='Covid-19' order by createdate desc ";
						$query = mysqli_query($conn, $sql);
						$count = 0;
						while ($data = mysqli_fetch_array($query)) {
						?>
							<?php
							$count += 1;
							if ($count == 5) {
								break;
							}
							echo '
						<div class="list-inner">
						<a href="display.php?id_post=' . $data["id_post"] . '">
							<img src="' . substr($data["hinhanh"], 0, 1000000) . '" alt="" class="image">
							<div class="list-content-cd">
							<div class="list-content-p">' . substr($data["title"], 0, 100) . ' ...</div>
							<h4> ' . date('d-m-Y',strtotime($data["createdate"]))  .' </h4>
							<p class="">
							
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
						<a class="xemthem" style="position: absolute; margin-left: 0;left: 120px;margin-top: 32px;" href="category.php?category='Covid-19'">Xem thêm </a>
                    </div>
                </div> 
            </div>
            <div class="clear"></div>
			<br>
	</div> 

<script>
	var content1 = document.querySelector('.list-content .list-content-66');
	var content1H = content1.offsetHeight - 200;
	content1HH = content1H.toString() + 'px';
	var content2 = document.querySelector('.list-content .list-content-33 ');
	content2.style.setProperty('height', content1HH)
</script>