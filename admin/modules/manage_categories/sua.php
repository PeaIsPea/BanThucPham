<?php
include("../../config/connection.php");
if (isset($_POST['submit']) && isset($_GET['id'])) {
    $ID_DanhMuc = $_GET['id'];
    $TenDanhMuc = $_POST['TenDanhMuc'];
    $Mota = $_POST['Mota'];
    if ($TenDanhMuc == "") {
        echo "Vui lòng nhập đủ tên!<br />";
    }
    if ($Mota == "") {
        echo "Vui lòng nhập đủ mô tả !<br />";
    }
    if ($TenDanhMuc != "" && $Mota != "") {
        $sql_fix = "UPDATE danhmuc SET TenDanhMuc = '" . $TenDanhMuc . "', Mota = '" . $Mota . "' WHERE ID_DanhMuc =$ID_DanhMuc";
        mysqli_query($mysqli, $sql_fix);
    }
}
header('location:../../index.php?cat=cat-product');
?>