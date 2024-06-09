<?php
include("../../../admin/config/connection.php");
session_start();
$id_cart = $_SESSION['ID_GioHang'];
if(isset($_GET['id'])){
	$id_product= $_GET['id'];
	$soluong = (int)$_POST['soluong'];
	$sql_check_product = "SELECT * FROM chitietgiohang WHERE ID_GioHang = $id_cart AND ID_SanPham = $id_product";
	$result = mysqli_query($mysqli, $sql_check_product);
	if ($result) {
		if (mysqli_num_rows($result) > 0) {
			$sql_update_quantity = "UPDATE chitietgiohang SET SoLuong = SoLuong + $soluong WHERE ID_GioHang = $id_cart AND ID_SanPham = $id_product";
        $update_result = mysqli_query($mysqli, $sql_update_quantity);
		} else {
			$sql_addtocart="INSERT INTO chitietgiohang(ID_GioHang,ID_SanPham,SoLuong) VALUES('".$id_cart."','".$id_product."','".$soluong."')";
			mysqli_query($mysqli,$sql_addtocart);
		}
	}
}
header('location: ../../../index.php?navigate=cart');
?>