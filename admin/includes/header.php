<?php require_once("includes/connection.php"); ?>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/web/website/admin/style/css/style.css">
    <script src="/web/website/admin/ckeditor/ckeditor.js"></script>
    <link rel="stylesheet" href="./assets/font/themify-icons-font/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="shotcut icon" href="https://news.gearvn.com/wp-content/uploads/2020/03/LogoGNews-01-300x105.png" type="image/x-icon">
    <title>WEB Tin Tức</title>
</head>

<body>
    <header class="header">
        <div class="search-btn ti-search" style="float: right;color: white;line-height: 80px;padding: 0 32px;right: 100px;position: relative;"></div>
        <div class="grid">
            <div class="header-logo navlogo">
                <li><a href="/web/website/index.php"><img src="https://news.gearvn.com/wp-content/uploads/2020/03/LogoGNews-01-300x105.png" alt="Logo"></a></li>
            </div>
            <div class="header-main mainnav">
                <ul>
                    <li><a href="/web/website/index.php">Trang chủ</a></li>
                    <li class="login-menu">
                        
                            <?php 
                            if (!empty($_SESSION['username'])) {
                                echo '<a href=""> Xin Chào ' . $_SESSION['fullname'] . '</a>';
                            }else {
                                echo '<a href=""><div class="ti-align-justify login-menu-x"></div></a>';
                            }
                            ?>
                        <div class="sub-login">
                            <?php
                            // echo $_SESSION['username'];
                            if (!empty($_SESSION['username'])) {
                                echo '<a href="dang-xuat.php"> Đăng Xuất</a>';
                            } else {
                                echo '<a href="dang-nhap.php">Đăng nhập</a>';
                                echo '<a href="dang-ky.php">Đăng ký</a>';
                            }

                            ?>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </header>