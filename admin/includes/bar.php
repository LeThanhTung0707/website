<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/web/website/admin/style/css/style.css">

    <script src="/web/website/admin/ckeditor/ckeditor.js"></script>
    <link rel="stylesheet" href="./assets/font/themify-icons-font/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="shotcut icon" href="https://news.gearvn.com/wp-content/uploads/2020/03/LogoGNews-01-300x105.png" type="image/x-icon">
    <title>WEB Tin Tức</title>
    <link rel="stylesheet" href="./style/css/styleadmin.css">
    <script src="./js/main.js"></script>
    <?php include "./includes/header.php" ?>
    <link rel="stylesheet" href="/web/website/assets/font/themify-icons-font/themify-icons/themify-icons.css">
</head>
<style>
    .header {
        display: none;
    }
</style>

<body class='app'>
    <?php include "./includes/navbar.php" ?>
    <div class="page-container">
        <div class="head-nav">
            <div class="head-container">
                <ul class="nav-left" onclick="closenav()">
                    <li>
                    </li>
                </ul>
                <ul onclick="opennav(this)" class="nav-right">
                    <li style="text-transform: uppercase;">Xin Chào <?php echo $_SESSION["username"];?> </li>
                    <ul class="sub-nav">
                        <li class="sub-nav-list"><a href="/web/website/dang-xuat.php">ĐĂNG XUẤT</a></li>
                    </ul>
                </ul>
            </div>
        </div>