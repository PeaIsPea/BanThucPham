<?php 
    include("../../config/connection.php"); 
    if (isset($_POST['submit'])) {
        $TenSanPham = $_POST['TenSanPham'];
        $GiaBan = $_POST['GiaBan'];
        $SoLuong = $_POST['SoLuong'];
        $MoTa = $_POST['MoTa'];
        $imageName = $_FILES['Img']['name'];
        $imageTemp = $_FILES['Img']['tmp_name'];
        move_uploaded_file($imageTemp, "../../../assets/image/product/" . $imageName);
        $ID_DanhMuc = $_POST['danhmuc'];
        $ID_NCC = $_POST['nhacungcap'];
        $GiamGia = $_POST['GiamGia'];
        $sql_add = "INSERT INTO sanpham(ID_DanhMuc,ID_NhaCungCap,TenSanPham,MoTa,GiaBan,SoLuong,Img,GiamGia) VALUES('".$ID_DanhMuc."','".$ID_NCC."','".$TenSanPham."','".$MoTa."','".$GiaBan."','".$SoLuong."','".$imageName."','".$GiamGia."')";
        mysqli_query($mysqli,$sql_add);
        }
    header('location: ../../index.php?product=list-product');
?>