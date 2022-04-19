<?php
session_start();
?>
<?php require_once("includes/connection.php"); ?>
<?php include("includes/permission.php"); ?>
<?php
$server_username = "root"; // thông tin đăng nhập host
$server_password = ""; // mật khẩu, trong trường hợp này là trống
$server_host = "localhost"; // host là localhost
$database = 'website'; // database là website
$conn = mysqli_connect($server_host, $server_username, $server_password, $database)
    or die("không thể kết nối tới database"); ?>
<html>
<?php include 'includes/bar.php' ?>

</html>
<style>
    table {
        border-collapse: collapse;
    }

    td {
        white-space: nowrap;
    }

    td a {
        display: inline-block;
    }

    input {
        display: block;
        width: 700px;
        height: calc(2.25rem + 2px);
        padding: .375rem .75rem;
        font-size: 1rem;
        line-height: 1.5;
        color: #495057;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #ced4da;
        border-radius: .25rem;
        transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        outline-color: red;
    }

    input[type="submit"] {
        width: 150px;
    }

    input[type="submit"]:hover {
        opacity: 1;
        -moz-transform: scale(1.02);
        -webkit-transform: scale(1.02);
        transform: scale(1.02);
    }
</style>
<div class="add" style="width:800px;margin:32px auto;margin-left:32px;">
    <?php
    if (isset($_GET["id_delete"])) {
        $sql1 = "DELETE FROM posts WHERE id_post = " . $_GET["id_delete"];
        mysqli_query($conn, $sql1);
    }
    if (isset($_GET['is_block'])) {
        echo 'Bài Viết bị ẩn';
        echo '<br>';
        $sql = "SELECT * FROM posts WHERE is_public=0";
    } else
if (isset($_GET['q']) && !empty($_GET['q'])) {
        $keyword = $_GET['q'];
        $sql = "SELECT count(id_post) as total FROM posts WHERE id_post LIKE '%$keyword%' or title LIKE '%$keyword%' or content LIKE '%$keyword%' ";

        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $total_records = $row['total'];
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit = 6;
        $total_page = ceil($total_records / $limit);
        if ($current_page > $total_page) {
            $current_page = $total_page;
        } else if ($current_page < 1) {
            $current_page = 1;
        }
        $start = ($current_page - 1) * $limit;
        $sql1 = "SELECT * FROM posts WHERE id_post LIKE '%$keyword%' or title LIKE '%$keyword%' or content LIKE '%$keyword%' LIMIT $start, $limit    ";
    } else {
        $sql = "SELECT count(id_post) as total FROM posts order by createdate  desc ";

        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $total_records = $row['total'];
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit = 6;
        $total_page = ceil($total_records / $limit);
        if ($current_page > $total_page) {
            $current_page = $total_page;
        } else if ($current_page < 1) {
            $current_page = 1;
        }
        $start = ($current_page - 1) * $limit;
        $sql1 = "SELECT * FROM posts order by createdate  desc LIMIT $start, $limit    ";
    }


    $query = mysqli_query($conn, $sql1);



    if (!$query) {

        echo '<table class="search-form" cellpadding="10">
    <tr>
        <td>
            <form action="" method="GET" style="position:relative;">
                <input style="display:inline-block;" title="Tìm Kiếm" type="text" name="q" placeholder="Tìm Kiếm Bài Viết" value='.$_GET["q"].'> 
                <button style="display:inline-block;height:calc(2rem + 6px);position:absolute;" class="btn btn-danger" type="submit"><div class="ti-search" style="color:white;font-weight:800;"></div></button>
            </form>
        </td>
       
    </tr>
</table>';
        echo "Không tìm thấy gì ";
    } else {
    ?>


        <table class="search-form" cellpadding="10">
            <tr>
                <td>
                    <form action="" method="GET" style="position:relative;">
                        <input required style="display:inline-block;" title="Tìm Kiếm" type="text" name="q" placeholder="Tìm Kiếm Bài Viết" value="<?php
                                                                                                                                            if (isset($_GET['q'])) {
                                                                                                                                                echo $_GET['q'];
                                                                                                                                            } ?>" />
                        <button style="display:inline-block;height:calc(2rem + 6px);position:absolute;" class="btn btn-danger" type="submit">
                            <div class="ti-search" style="color:white;font-weight:800;"></div>
                        </button>
                    </form>
                </td>

            </tr>
        </table>
        <span>
            <span></span>

        </span>


        <div style="height:32px;"></div>
        <table class="table table-striped table-hover" border="1px;" align="center" style="width:76vw;">
            <thead>
                <tr>
                    <td bgcolor="#E6E6FA">ID</td>
                    <td bgcolor="#E6E6FA">Title</td>
                    <td bgcolor="#E6E6FA">Lượt xem</td>
                    <td bgcolor="#E6E6FA">Trạng thái</td>

                    <td bgcolor="#E6E6FA">Hành động</td>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($data = mysqli_fetch_array($query)) {
                    $i = 1;
                    $id_post = $data['id_post'];
                ?>
                    <tr>
                        <td><?php echo $id_post; ?></td>
                        <td><?php echo $data['title']; ?></td>
                        <td><?php echo $data['view']; ?></td>
                        <td><?php echo ($data['is_public'] == 1) ? "Public" : "Ẩn"; ?></td>
                        <td>
                            <?php if (isset($_GET["id_post"])) {
                                $id_post = intval($_GET['id_post']);
                            } ?>
                            <button class="btn"><a href="quan-ly-bai-viet.php?id_edit=<?php echo $id_post; ?>">
                                    <div class="ti-settings" style="color:blue;font-weight:800;"></div>
                                </a></button>
                             <?php 
                             if($_SESSION["permision"] ==1 ) {
                             ?>       
                            <button class="btn"><a href="danh-sach-bai-viet.php?id_delete=<?php echo $id_post; ?>">
                                    <div class="ti-trash" style="color:red;font-weight:800;"></div>
                                </a></button>

                            <?php } ?>
                        </td>
                    </tr>
                <?php
                    $i++;
                }
                ?>
            </tbody>

        </table>
        <div class="pagination">

            <?php if ($current_page > 1 && $total_page > 1) {
                echo '<a class="xemthem-prev btn btn-danger" style="margin-right:12px;" href="danh-sach-bai-viet.php?page=' . ($current_page - 1) . '">Prev</a>  ';
            }
            // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
            if ($current_page < $total_page && $total_page > 1) {
                echo '<a class="xemthem-next btn btn-danger" href="danh-sach-bai-viet.php?page=' . ($current_page + 1) . '">Next</a>  ';
            } ?>


        </div>


</div>



<?php } ?>
</div>
</body>