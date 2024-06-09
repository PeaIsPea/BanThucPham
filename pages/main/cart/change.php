<?php
include("../../../admin/config/connection.php");
session_start();
$id_cart = $_SESSION['ID_GioHang'];
if(isset($_GET['id']) && isset($_GET['change'])){
    $id = $_GET['id'];
    if($_GET['change'] == 'plus'){
        $sql_update = "UPDATE chitietgiohang SET SoLuong = SoLuong + 1 WHERE ID_SanPham = '$id' AND ID_GioHang = '$id_cart'";
        $update_result = mysqli_query($mysqli, $sql_update);
    }
    if($_GET['change'] == 'minus') {
        $sql_sl = "SELECT SoLuong FROM chitietgiohang WHERE ID_SanPham = '$id' AND ID_GioHang = '$id_cart'";
        $result = mysqli_query($mysqli, $sql_sl);
        $row = mysqli_fetch_assoc($result);
        $soLuongHienTai = $row['SoLuong'];

        if ($soLuongHienTai >= 1) {
            if ($soLuongHienTai == 1) {
                $deleteQuery = "DELETE FROM chitietgiohang WHERE ID_SanPham = '$id' AND ID_GioHang = '$id_cart'";
                $deleteResult = mysqli_query($mysqli, $deleteQuery);
            } else {
                $sql_update = "UPDATE chitietgiohang SET SoLuong = SoLuong - 1 WHERE ID_SanPham = '$id' AND ID_GioHang = '$id_cart'";
                $update_result = mysqli_query($mysqli, $sql_update);
            }
        }
    }
}
header('location: ../../../index.php?navigate=cart');
?>