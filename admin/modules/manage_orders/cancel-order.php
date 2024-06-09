<?php 
	include("../../config/connection.php"); 
	if (isset($_GET['id'])) {
	$ID_DonHang=$_GET['id'];
	$sql_Order="UPDATE donhang SET XuLy='2' where ID_DonHang=$ID_DonHang";
	mysqli_query($mysqli,$sql_Order);
	$sql_order = "SELECT * FROM chitietdonhang 
	where chitietdonhang.ID_DonHang = $ID_DonHang";
	$query_order = mysqli_query($mysqli, $sql_order);
	while ($row = mysqli_fetch_assoc($query_order)) {
		$id_sanpham = $row['ID_SanPham'];
		$soluong = $row['SoLuong'];
		$sql_update = "UPDATE sanpham set SoLuong = SoLuong + $soluong where ID_SanPham = $id_sanpham";
		$query_update = mysqli_query($mysqli, $sql_update);
	}
	}
	header('location:../../index.php?order=order-list');
?>