<?php require_once("includes/connection.php"); ?>
<?php
$sql = "select * from posts where is_public = 1 order by view desc   ";
$query = mysqli_query($conn, $sql);

?>
<div class="main-footer">
        <!-- Footer 1  -->
        
        <div class="footer-container row ">
               
            <div class="col-third col">
                <div class="footer-header"><h3>BÀI VIẾT PHỔ BIẾN</h3></div>
                <?php
				$count = 0;
				while ($data = mysqli_fetch_array($query)) {
				?>
					
					<?php
					$count += 1;
					if ($count >2 ) {
						break;
					}
                    echo '
                <div class="footer-content hori-line">
                    <a href="display.php?id_post=' . $data["id_post"] . '">
                    <div class="image"><img src="' . substr($data["hinhanh"], 0, 1000000) . '" alt=""></div>
                    <div class="sub-content">' . substr($data["title"], 0, 100) . ' ...</div>
                    </a>
                </div>
                '
                ?>
                 <?php }?>
                 <?php
				$count = 0;
				while ($data = mysqli_fetch_array($query)) {
				?>
					
					<?php
					$count += 1;
					if ($count >1 ) {
						break;
					}
                    echo '
                <div class="footer-content">
                    <a href="display.php?id_post=' . $data["id_post"] . '">
                    <div class="image"><img src="' . substr($data["hinhanh"], 0, 1000000) . '" alt=""></div>
                    <div class="sub-content">' . substr($data["title"], 0, 100) . ' ...</div>
                    </a>
                </div>
                </div>'
                ?>
                 <?php }?>
            
           
            <div class="col-third col">
                <div class="footer-header"><h3>BÀI VIẾT PHỔ BIẾN</h3></div>
                <?php
				$count = 0;
				while ($data = mysqli_fetch_array($query)) {
				?>
					
					<?php
					$count += 1;
					if ($count >2 ) {
						break;
					}
                    echo'
                <div class="footer-content hori-line">
                    <a href="display.php?id_post=' . $data["id_post"] . '">
                    <div class="image"><img src="' . substr($data["hinhanh"], 0, 1000000) . '" alt=""></div>
                    <div class="sub-content">' . substr($data["title"], 0, 100) . ' ...</div>
                    </a>
                </div>'
                ?>
                <?php }?>
                
                <?php
				$count = 0;
				while ($data = mysqli_fetch_array($query)) {
				?>
					
					<?php
					$count += 1;
					if ($count >1 ) {
						break;
					}
                    echo'
                <div class="footer-content">
                    <a href="display.php?id_post=' . $data["id_post"] . '">
                    <div class="image"><img src="' . substr($data["hinhanh"], 0, 1000000) . '" alt=""></div>
                    <div class="sub-content">' . substr($data["title"], 0, 100) . ' ...</div>
                    </a>
                </div>'
                ?>
                <?php }?>
                
            </div>

                    <!-- online user -->
            <div class="col-third col">
                <div class="footer-header"><h3><?php include "includes/user_online.php"?></h3></div>
                <ul class="padding-slide">
                <?php include 'access.php'?>
               </ul>
            </div>
            <div class="clear"></div>
            
        </div>
        <div class="footer-intro">
            <div class="footer-intro-logo"><a href=""><img src="https://scontent.xx.fbcdn.net/v/t1.15752-9/184652798_526657461668460_2188350471825666194_n.png?_nc_cat=106&ccb=1-3&_nc_sid=aee45a&_nc_ohc=ngqOwmf6jvUAX-tfM90&_nc_ad=z-m&_nc_cid=0&_nc_ht=scontent.xx&oh=b0476cc05926bf0207f4e0a9ac29c864&oe=60BF74F1" alt=""></a></div>
            <div class="footer-intro-about">
                <h2>VỀ CHÚNG TÔI</h2>
                <div>NHÓM WEB TIN TỨC</div>
                <div>Liên Hệ chúng tôi : <a href="https://www.facebook.com/meomeo.pate">Facebook</a></div>
            </div>
            <div class="footer-intro-folow">
                <h2>THEO DÕI CHÚNG TÔI</h2>
                <a href="https://www.facebook.com/meomeo.pate">
                    <div class="ti-facebook"></div>
                </a>
                <a href="https://www.youtube.com">
                    <div class="ti-youtube"></div>
                </a>
            </div>
            <div class="clear"></div>
        </div>
    </div>