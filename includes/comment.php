<div id="cm" class="comment">
				<div class="header-comment">
					<span style="font-size:20px;font-weight:550;">Bình Luận</span>
				</div>
				<?php if (isset($_SESSION['username'])) : ?>
					<form method="post" action="display.php?id_post=<?php echo $_GET["id_post"] ?>#cm">
						<div class="comment-input">
							<span><img src="" alt=""></span>
							<textarea name="content" id="text-comment" cols="97" rows="1"></textarea>
							<!-- jquery auto height -->
							<script>
								$('textarea').each(function() {
									this.setAttribute('style', 'height:' + (this.scrollHeight) + 'px;overflow-y:hidden;');
								}).on('input', function() {
									this.style.height = 'auto';
									this.style.height = (this.scrollHeight) + 'px';
								});
							</script>
							<input class="btn btn-danger" type="submit" name="btn_submit" value="Bình Luận">
						</div>
					</form>
					
				<?php else :  ?>
					<div class="comment-input"><div>Bạn Cần <a href="dang-nhap.php">Đăng Nhập</a> để có thể tham gia bình luận</div></div>
				<?php endif ?>
				

				<?php
				$id_posttt=$_GET['id_post'];
				$truy = "select * from comments where id_post=$id_posttt order by submit_date desc" ;
				$count=0;
				if (!$truy) echo ' Chưa có Bình Luận nào !' ;
				else {
					$pick = mysqli_query($conn,$truy);
					while($binhluan = mysqli_fetch_array($pick)) {
						$count++;
						$now = date ('d/m/Y - H:i:s');
						$noww = strtotime(date('Y-m-d H:i:s'));
						$dates=$binhluan["submit_date"];
						$datess   =strtotime($dates);	
						$timess= 18000+$noww-$datess;
						$time="";
						if ($timess<3600) $time ="". floor($timess/60) . " phút trước";
						else 
						if ($timess<86400) $time="". floor($timess/3600)." giờ trước";
						else 
						if($timess<2592000) $time="". floor($timess/86400)." ngày trước";
						else 
						if($timess <31104000) $time="". floor($timess/2592000)." tháng trước";
						else $time="" .floor($timess/31104000) ."năm trước";
						echo '<div class="main-comment">
						<div class="comment-inner">
							
							<div class="comment-author">
								<div class="comment-n"><span id="span1">'. $binhluan["name"] . '</span><span id="span2">'. $time .'</span></div>
								<div class="content">'. $binhluan["content"].'</div>
							</div>
							
						</div>
					</div>';
					};
				}

				if($count==0) echo '
				<div style="height:30px;"></div>
				Chưa có bình luận nào !' ;
				
				?>
				
			
			</div>