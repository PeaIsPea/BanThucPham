<?php 
    include("../../config/connection.php");
    if (isset($_GET['id'])) {
    $ID_BinhLuan=$_GET['id'];
    $sql="DELETE FROM  binhluan WHERE ID_BinhLuan='".$ID_BinhLuan."'";
    mysqli_query($mysqli,$sql);
    }
    header('location:../../index.php?user=comments');
?>