<div class="content-slide">
		<div style="padding-left: 16px; padding-bottom: 16px;">
			<h2>Dành cho Game thủ</h2>
		</div>
		<div class="slideshow-container">
			<?php
			$sql = "select * from posts where category = 'Tin Game' order by RAND()  ";
			$query = mysqli_query($conn, $sql);
			
			for ($a = 0; $a < 3; $a++) {
			?>
				<div class="mySlides fade ">
					<?php
					$count = 0;
					while ($data = mysqli_fetch_array($query)) {
					?>

						<?php
						$count += 1;
						if ($count > 4) {
							break;
						}
						echo '
							<div class="content-slide-in col">
								<a href="display.php?id_post=' . $data["id_post"] . '">
									<div class="image"><img src="' . substr($data["hinhanh"], 0, 1000000) . '" alt=""></div>
									<div class="text">' . substr($data["title"], 0, 300) . '</div>
								</a>
							</div>
							';
						// }
						?>
					<?php
					}
					?>

					<div class="clear"></div>
				</div>
			<?php } ?>



			<!-- button next prv -->
			<a class="prev" onclick="plusSlides(-1)">
				<div class="ti-arrow-circle-left"></div>
			</a>
			<a class="next" onclick="plusSlides(1)">
				<div class="ti-arrow-circle-right"></div>
			</a>
		</div>
	
	

	</div>
    <script>
	var slideIndex = 1;
	showSlides(slideIndex);

	// Next/previous controls
	function plusSlides(n) {
		showSlides(slideIndex += n);
	}

	// Thumbnail image controls
	function currentSlide(n) {
		showSlides(slideIndex = n);
	}

	function showSlides(n) {
		var i;
		var slides = document.getElementsByClassName("mySlides");

		if (n > slides.length) {
			slideIndex = 1
		}
		if (n < 1) {
			slideIndex = slides.length
		}
		for (i = 0; i < slides.length; i++) {
			slides[i].style.display = "none";
		}
		slides[slideIndex - 1].style.display = "block";
	}
</script>
