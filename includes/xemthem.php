<div class="list-content">
    <div class="col-third-2 list-content-66">
        <?php
        if (isset($_GET['q']) && !empty($_GET['q'])) {
            $keyword = $_GET['q'];
            echo "Kết quả tìm kiếm cho: \" $keyword \" ";
            $sql = "SELECT * FROM posts WHERE title LIKE '%$keyword%' or content LIKE '%$keyword%' ";
            $sql = "SELECT * FROM posts WHERE title LIKE '%$keyword%' or content LIKE '%$keyword%' or category like '%$keyword%' ";
            $result = mysqli_query($conn, "select count(id_post) as total from posts WHERE title LIKE '%$keyword%' or content LIKE '%$keyword%' or category like '%$keyword%' ");
            $row = mysqli_fetch_array($result);
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
            $result = mysqli_query($conn, "SELECT * FROM posts WHERE title LIKE '%$keyword%' or content LIKE '%$keyword%' or category like '%$keyword%' LIMIT $start, $limit");
            $query = mysqli_query($conn, $sql);

            if(!$result) : { 
                echo ' Không có kết quả';
            }
            else:
            while ($data = mysqli_fetch_array($result)) { ?>
            <?php
                echo '	
                    <div class="list-content-nd">
                    <a href="display.php?id_post=' . $data["id_post"] . '">
                        <img class=image src="' . substr($data["hinhanh"], 0, 1000000) . '" alt="" height="150px" width="218px">
                        <div class="list-content-cd">
                            <h3>' . $data["title"] . '</h3>
                            <h4> ' . date('d-m-Y',strtotime($data["createdate"]))  .' </h4>
                            <p class="list-content-p">
                                <p>' . substr($data["displaycontent"], 0, 3000) . ' </p>
                            </p>
                        </div>
                        <div class="clear"></div>
                    </a>
                    </div>
                    ';
            }

            endif
            ?>

            <div class="pagination">

                <?php if ($current_page > 1 && $total_page > 1) {
                    echo '<a class="xemthem-prev" href="ketqua.php?page=' . ($current_page - 1) . '&q=' . ($keyword) . '">Prev</a>  ';
                }
                // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
                if ($current_page < $total_page && $total_page > 1) {
                    echo '<a class="xemthem-next" href="ketqua.php?page=' . ($current_page + 1) . '&q=' . ($keyword) . '">Next</a>  ';
                } ?>


            </div>
            <?php
        } else {
            $result = mysqli_query($conn, 'select count(id_post) as total from posts ');
            $row = mysqli_fetch_assoc($result);
            $total_records = $row['total'];
            $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
            $limit = 8;
            $total_page = ceil($total_records / $limit);
            if ($current_page > $total_page) {
                $current_page = $total_page;
            } else if ($current_page < 1) {
                $current_page = 1;
            }
            $start = ($current_page - 1) * $limit;
            $result = mysqli_query($conn, "SELECT * FROM posts order by updatedate desc LIMIT $start, $limit");
            while ($data = mysqli_fetch_array($result)) { ?>
            <?php
                echo '	
                    <div class="list-content-nd">
                    <a href="display.php?id_post=' . $data["id_post"] . '">
                        <img class=image src="' . substr($data["hinhanh"], 0, 1000000) . '" alt="" height="150px" width="218px">
                        <div class="list-content-cd">
                            <h3>' . $data["title"] . '</h3>
                            <h4> ' . date('d-m-Y',strtotime($data["createdate"]))  .' </h4>
                            <p class="list-content-p">
                                <p>' . substr($data["displaycontent"], 0, 3000) . ' </p>
                            </p>
                        </div>
                        <div class="clear"></div>
                    </a>
                    </div>
                    ';
            }

            ?>
            <div class="pagination">

                <?php if ($current_page > 1 && $total_page > 1) {
                    echo '<a class="xemthem-prev" href="ketqua.php?page=' . ($current_page - 1) . '">Prev</a>  ';
                }
                // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
                if ($current_page < $total_page && $total_page > 1) {
                    echo '<a class="xemthem-next" href="ketqua.php?page=' . ($current_page + 1) . '">Next</a>  ';
                } ?>


            </div>
        <?php
        }



        ?>


    </div>
    <?php include "includes/sidebar.php" ?>
</div>
<div class="clear"></div>
</div>