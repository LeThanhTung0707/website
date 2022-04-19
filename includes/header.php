<?php require_once("includes/connection.php"); ?>
<?php session_start() ?>
<html>

<head>
    <!-- <meta http-equiv="Content-Type" content="text/html; charset=utf-8"> -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS only -->
    <!-- <title>Demo website</title> -->
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/font/themify-icons-font/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <link rel="shotcut icon" href="https://news.gearvn.com/wp-content/uploads/2020/03/LogoGNews-01-300x105.png" type="image/x-icon">
    <title>WEB Tin Tức</title>
</head>

<body>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v10.0" nonce="tF3dMJW6"></script>
    <header class="header">
        <div class="search-index">
            <div class="search-btn ti-search" onclick="openSearch()"></div>
            <?php include("includes/searchicon.php") ?>
        </div>
        <div class="grid">
            <div class="header-logo navlogo">
                <li><a href="index.php"><img src="https://technewsdaily.vn/zfiles/2020/08/news.jpg" alt="Logo"></a></li>

            </div>
            <div class="header-main mainnav">
                <ul>
                    <li><a href="index.php">Trang chủ</a></li>
                    <li>
                        <a href="category.php?category='Công Nghệ'">Công Nghệ </a>
                        
                    </li>
                    <li>
                        <a href="category.php?category='Tin Game'">Tin game</a>
                        
                    </li>
                    <li>
                        <a href="category.php?category='Xã Hội'">Xã Hội</a>
                        
                    </li>
                    <li class="login-menu">
                        <?php
                        ?>
                        <?php
                        if (!empty($_SESSION['username'])) {
                            echo '<a href=""> Xin Chào ' . $_SESSION['fullname'] . '</a>';
                        } else {
                            echo '<a href=""><div class="ti-align-justify login-menu-x"></div></a>';
                        }
                        ?>
                        <div class="sub-login">
                            <?php                           
                            if (isset($_SESSION['username'])) {
                                // $sql = "SELECT id_user FROM users WHERE username = '" . $_SESSION['username'] . "'";
                                // $query1 = mysqli_query($conn, $sql);
                                // $data1 = $query1->fetch_assoc();                               
                                // echo '<a href="canhan.php?id_user='. $data1["id_user"] .'"> Cá nhân</a>';
                                if ($_SESSION['permision'] == 1 || $_SESSION['permision']==2) {
                                    echo '<a href="quanlyadmin.php">Admin</a>';}	                 
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
    <script>
        function openSearch() {
            var btnSearch = document.querySelector('.header .search-form');

            if (btnSearch.getAttribute('class') == 'search-form search-form-open') {
                btnSearch.setAttribute('class', 'search-form');
            } else {
                btnSearch.setAttribute('class', 'search-form search-form-open');
            }
        }
    </script>