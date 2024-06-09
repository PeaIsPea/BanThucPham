<?php
    include("../../../admin/config/connection.php");
    session_start();
    $id_order = $_GET['id_cancel'];
    $sql_cancel = "UPDATE donhang SET XuLy = 2 WHERE ID_DonHang = $id_order";
    $query_cancel = mysqli_query($mysqli, $sql_cancel);
    $sql_order = "SELECT * FROM chitietdonhang 
	where chitietdonhang.ID_DonHang = $id_order";
	$query_order = mysqli_query($mysqli, $sql_order);
	while ($row = mysqli_fetch_assoc($query_order)) {
		$id_sanpham = $row['ID_SanPham'];
		$soluong = $row['SoLuong'];
		$sql_update = "UPDATE sanpham set SoLuong = SoLuong + $soluong where ID_SanPham = $id_sanpham";
		$query_update = mysqli_query($mysqli, $sql_update);
	}
    header('location: ../../../index.php?navigate=orderHistory');
?>