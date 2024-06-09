<?php 
    include("../../config/connection.php");
    if (isset($_GET['id'])) {
    $id_thanhvien = $_GET['id'];
    $query_delete_chitietdonhang = "DELETE FROM chitietdonhang WHERE ID_DonHang IN
    (SELECT ID_DonHang FROM donhang WHERE ID_DonHang IN
    (SELECT ID_DonHang FROM donhang WHERE ID_ThanhVien = '$id_thanhvien'))";
    mysqli_query($mysqli, $query_delete_chitietdonhang);
    $query_delete_chitietgiohang = "DELETE FROM chitietgiohang WHERE ID_GioHang IN
    (SELECT ID_GioHang FROM giohang WHERE ID_ThanhVien = '$id_thanhvien')";
    mysqli_query($mysqli, $query_delete_chitietgiohang);
    $query_delete_donhang = "DELETE FROM donhang WHERE ID_DonHang IN
    (SELECT ID_DonHang FROM donhang WHERE ID_ThanhVien = '$id_thanhvien')";
    mysqli_query($mysqli, $query_delete_donhang);
    $query_delete_binhluan = "DELETE FROM binhluan WHERE ID_ThanhVien = '$id_thanhvien'";
    mysqli_query($mysqli, $query_delete_binhluan);
    $query_delete_giohang = "DELETE FROM giohang WHERE ID_ThanhVien = '$id_thanhvien'";
    mysqli_query($mysqli, $query_delete_giohang);
    $query_delete_thanhvien = "DELETE FROM thanhvien WHERE ID_ThanhVien = '$id_thanhvien'";
    mysqli_query($mysqli, $query_delete_thanhvien);
    }
    header('location:../../index.php?user=list-user');
?>