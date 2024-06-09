<?php
include("../../config/connection.php"); 
if (isset($_GET['id_NCC'])) {
    $ID_NCC = $_GET['id_NCC'];
    $name = $_POST['name'];
    $MoTa = $_POST['MoTa'];
    $email = $_POST['email'];
    $SoDienThoai = $_POST['SoDienThoai'];
    $DiaChi = $_POST['DiaChi'];
    if ($_FILES['image']['name'] != ""){
        $query_select_image = "SELECT Img FROM nhacungcap WHERE ID_NCC = $ID_NCC";
        $result_select_image = mysqli_query($mysqli, $query_select_image);
        $row_select_image = mysqli_fetch_assoc($result_select_image);
        $imageToDelete = $row_select_image['Img'];
        unlink("../../../assets/image/supplier/".$imageToDelete);
        $imageName = $_FILES['image']['name'];
        $imageTemp = $_FILES['image']['tmp_name'];
        move_uploaded_file($imageTemp, "../../../assets/image/supplier/" . $imageName);
        $sql_update_anh = "UPDATE nhacungcap SET Img = '$imageName' WHERE ID_NCC= '$ID_NCC'";
        mysqli_query($mysqli, $sql_update_anh);
    }
    $sql_fix = "UPDATE nhacungcap SET TenNCC = '" . $name . "', MoTa = '" . $MoTa . "', email = '" . $email . "',SoDienThoai = '" . $SoDienThoai . "',DiaChi = '" . $DiaChi . "' WHERE ID_NCC= '$ID_NCC' ";
    mysqli_query($mysqli, $sql_fix);
}
header('location:../../index.php?ncc=list-ncc');
?>