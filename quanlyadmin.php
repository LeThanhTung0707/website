<?php require_once("includes/connection.php"); ?>
<?php
$server_username = "root"; // thông tin đăng nhập host
$server_password = ""; // mật khẩu, trong trường hợp này là trống
$server_host = "localhost"; // host là localhost
$database = 'website'; // database là website
$conn = mysqli_connect($server_host, $server_username, $server_password, $database)
    or die("không thể kết nối tới database"); ?>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <?php include "./includes/header.php" ?>
    <link rel="stylesheet" href="./admin/style/css/styleadmin.css">
    <script src="./admin/js/main.js"></script>

</head>

<style>
    .header {
        display: none;
    }
</style>

<body class="app" >
    <?php include "./admin/includes/navbar.php" ?>
    <div class="page-container" >
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
    <div class="container">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        </div>
        
        <?php
        $sql = "SELECT COUNT(`id_post`) FROM `posts` UNION SELECT COUNT(`is_public`) FROM `posts` WHERE is_public = 0";
        $result = mysqli_query($conn, $sql);
        $count = $result->fetch_all();
        ?>
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h4 mb-0 text-gray-800">Bài Viết</h1>
        </div>
        <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Số Bài Viết</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"> <?php echo $count[0][0];?> </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Số Bài Viết Ẩn</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"> <?php echo $count[1][0];?> </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
            </div>          
        </div>
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h4 mb-0 text-gray-800">Thống kê bài viết</h1>
        </div>
    <div class="row">           
        <?php 
        $sql = "SELECT COUNT(`id_post`) FROM `posts` UNION SELECT COUNT(`category`) FROM `posts` WHERE category = 'Tin Game'";
        $result = mysqli_query($conn, $sql);
        $count = $result->fetch_all();
        
        ?>
        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Tin Game</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $count[1][0];?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
        </div>
        <?php 
        $sql = "SELECT COUNT(`id_post`) FROM `posts` UNION SELECT COUNT(`category`) FROM `posts` WHERE category = 'Công Nghệ'";
        $result = mysqli_query($conn, $sql);
        $count = $result->fetch_all();
       
        ?>
         <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                               Tin Công Nghệ</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $count[1][0]; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
        <?php 
        $sql = "SELECT COUNT(`id_post`) FROM `posts` UNION SELECT COUNT(`category`) FROM `posts` WHERE category = 'Xã Hội'";
        $result = mysqli_query($conn, $sql);
        $count = $result->fetch_all();
        ?>
           <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Tin Xã Hội</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $count[1][0]; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php 
        $sql = "SELECT COUNT(`id_post`) FROM `posts` UNION SELECT COUNT(`category`) FROM `posts` WHERE category = 'Covid-19'";
        $result = mysqli_query($conn, $sql);
        $count = $result->fetch_all();
        ?>
           <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Tin Covid-19</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $count[1][0]; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
       
    </div>
        <?php
      
        $sql = "SELECT COUNT(`id_user`) FROM `users` UNION SELECT COUNT(`is_block`) FROM `users` WHERE is_block = 1";
        $result = mysqli_query($conn, $sql);
        $count = $result->fetch_all();
        ?>
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h4 mb-0 text-gray-800">Tài Khoản</h1>
        </div>

        <div class="row">
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total users</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $count[0][0]; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Blocked Users</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $count[1][0]; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                      
        </div>
    </div>
    </div>
</body>
