<?php 
include("../../config/connection.php"); 
if (isset($_POST['submit'])) {
    $TenNCC = $_POST['TenNCC'];
    $Email = $_POST['Email'];
    $SoDienThoai = $_POST['SoDienThoai'];
    $DiaChi = $_POST['DiaChi'];
    $imageName = $_FILES['Img']['name'];
    $imageTemp = $_FILES['Img']['tmp_name'];
    move_uploaded_file($imageTemp, "../../../assets/image/supplier/" . $imageName);
    $moTa = $_POST['MoTa'];
    $sql_add = "INSERT INTO nhacungcap(TenNCC,MoTa,Email,SoDienThoai,DiaChi,Img) VALUE('".$TenNCC."','".$moTa."','".$Email."','".$SoDienThoai."','".$DiaChi."','".$imageName."')";
    mysqli_query($mysqli,$sql_add);
}
header('location:../../index.php?ncc=list-ncc');
?>