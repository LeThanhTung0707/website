<?php require_once("includes/connection.php"); ?>

<?php 
$keytitle =$_GET['q'];
?>
<head>
    <title>
     <?php echo $keytitle;?> - Web Tin Tức
    </title>
</head>
<?php
include "includes/header.php" ?>
<div style="padding-top:80px;"></div>
<?php include "includes/xemthem.php" ?>
<?php include "includes/footer.php" ?>

<?php
if(isset($_GET['q']) && !empty($_GET['q']))
{
 $keyword = $_GET['q'];
 $sql = "SELECT * FROM posts WHERE title LIKE '%$keyword%' or content LIKE '%$keyword%' ";
} else {
 $sql = "SELECT * FROM posts ";
 
}

?>

