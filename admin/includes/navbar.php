    <div class="sidebar overhide">
        <div class="sidebar-inner">
            <!-- LOGO -->
            <a href="">
                <div class="sidebar-logo">
                    <div class="logo"><img src="https://logodix.com/logo/1707088.png" alt=""></div>
                    <a href="/web/website/quanlyadmin.php"><div class="text">Administrator</div></a>
                    <div class="clear"></div>
                </div>
            </a>
            <!-- MENU -->
            <div class="menu">
                <ul class="sidebar-menu overhide">
                   
                    <li>
                        <div class="nav-item">
                            <div class="main-nav">
                                <div class="ti-home nav-dashboard nav-icon"></div>
                                <a href="/web/website/quanlyadmin.php"><div class="title">Admin</div></a>
                            </div>

                        </div>
                    </li>

                    <?php 
                    if ($_SESSION["permision"]==1) {
                    ?>
                    <li>
                        <div class="nav-item" onclick="opennav(this)">
                            <div class="main-nav">
                                <div class="ti-user nav-user nav-icon"></div>
                                <div class="title">User </div>
                                <div class="ti-angle-down dropdown"></div>
                            </div>
                            <ul class="sub-nav">
                                <a href="/web/website/admin/them-thanh-vien.php"><li class="sub-nav-list">Add</li></a>
                                <a href="/web/website/admin/quan-ly-thanh-vien.php"><li class="sub-nav-list">Manage</li></a>
                            </ul>
                        </div>
                    </li>
                    <?php } ?>
                    <li>
                        <div class="nav-item" onclick="opennav(this)">
                            <div class="main-nav">
                                <div class="ti-folder nav-post nav-icon"></div>
                                <div class="title">Post</div>
                                <div class="ti-angle-down dropdown"></div>
                            </div>
                            <ul class="sub-nav">
                                <a href="/web/website/admin/them-bai-viet-ck.php"><li class="sub-nav-list">Add</li></a>
                                <a href="/web/website/admin/danh-sach-bai-viet.php"><li class="sub-nav-list">Manage</li></a>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <div class="nav-item">
                            <div class="main-nav">
                                
                                <a href="/web/website/index.php"><div class="title">Quay lại Trang chủ</div></a>
                            </div>

                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    

<!-- đóng mở bằng width -->
<!-- <div class="main">
    <a href="./admin/quan-ly-thanh-vien.php">Quản lý thành viên</a>
    <br>
    <a href="./admin/them-bai-viet-ck.php">Thêm bài viết</a>
</div> -->