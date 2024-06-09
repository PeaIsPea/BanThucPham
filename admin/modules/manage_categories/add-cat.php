<?php
include("../../config/connection.php");
session_start();
if (isset($_POST['add'])) {
    $TenDanhMuc=$_POST['name'];
    $Mota=$_POST['Mota'];
    $sql_add = "INSERT INTO danhmuc(TenDanhMuc,Mota) VALUES('".$TenDanhMuc."','".$Mota."')";
    mysqli_query($mysqli,$sql_add);
    header('location: ../../index.php?cat=cat-product');
  }
?>