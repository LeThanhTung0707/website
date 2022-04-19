<!-- <table class="search-form" cellpadding="10"> -->
<div class="search-form">
    <form action="ketqua.php" method="GET">
        <input type="text" name="q" placeholder="Nhập từ khoá cần tìm" value="<?php
            if (isset($_GET['q'])) {echo $_GET['q'];}?>"/>
        <input type="submit" value="TÌM KIẾM"/>
    </form>  
    </div>
<!-- </table> -->

