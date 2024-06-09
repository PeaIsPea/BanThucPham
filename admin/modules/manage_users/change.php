<?php
include("../../config/connection.php");
if (isset($_POST['submit'])) {
    $id = $_GET['id'];
    $HoVaTen = $_POST['HoVaTen'];
    $DiaChi = $_POST['DiaChi'];
    $SoDienThoai = $_POST['SoDienThoai'];
    $sql_fix = "UPDATE thanhvien SET HoVaTen =  '$HoVaTen', DiaChi =  '$DiaChi', SoDienThoai =  '$SoDienThoai' WHERE ID_ThanhVien = '$id'";
    mysqli_query($mysqli, $sql_fix);
    if($_POST['MatKhau'] != "") {
        $MatKhau = md5($_POST['MatKhau']); 
        $sql_update = "UPDATE thanhvien SET MatKhau =  '$MatKhau' WHERE ID_ThanhVien = '$id'";
        mysqli_query($mysqli, $sql_update);
    }
    }
    header('location:../../index.php?user=list-user');
?>