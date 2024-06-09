<?php 
	include("../../config/connection.php"); 
	if (isset($_GET['id_NCC'])) {
	$ID_NCC = $_GET['id_NCC'];
	$query_select_image = "SELECT Img FROM nhacungcap WHERE ID_NCC = $ID_NCC";
    $result_select_image = mysqli_query($mysqli, $query_select_image);
    $row_select_image = mysqli_fetch_assoc($result_select_image);
    $imageToDelete = $row_select_image['Img'];
    unlink("../../../assets/image/supplier/".$imageToDelete);
	$sql_xoa="DELETE FROM nhacungcap where nhacungcap.ID_NCC='$ID_NCC'";
    mysqli_query($mysqli,$sql_xoa);
	}
	header('location:../../index.php?ncc=list-ncc');
?>
