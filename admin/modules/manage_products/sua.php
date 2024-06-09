<?php
    include("../../config/connection.php"); 
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $TenSanPham = $_POST['TenSanPham'];
        $MoTa = $_POST['MoTa'];
        $SoLuong = $_POST['SoLuong'];
        $GiaBan = $_POST['GiaBan'];
        $ID_DanhMuc = $_POST['danhmuc'];
        $ID_NCC = $_POST['nhacungcap'];
        if ($_FILES['image']['name'] != ""){
            $query_select_image = "SELECT Img FROM sanpham WHERE ID_SanPham = $id";
            $result_select_image = mysqli_query($mysqli, $query_select_image);
            $row_select_image = mysqli_fetch_assoc($result_select_image);
            $imageToDelete = $row_select_image['Img'];
            unlink("../../../assets/image/product/".$imageToDelete);
            $imageName = $_FILES['image']['name'];
            $imageTemp = $_FILES['image']['tmp_name'];
            move_uploaded_file($imageTemp, "../../../assets/image/product/" . $imageName);
            $sql_update_anh = "UPDATE sanpham SET Img = '$imageName' WHERE ID_SanPham= '$_GET[id]' ";
            mysqli_query($mysqli, $sql_update_anh);
        }
        $GiamGia = $_POST['GiamGia'];
        $sql_fix = "UPDATE sanpham SET ID_DanhMuc =  '$ID_DanhMuc', ID_NhaCungCap= '" . $ID_NCC . "', TenSanPham = '" . $TenSanPham . "', MoTa = '" . $MoTa . "', SoLuong = '$SoLuong', 
        GiaBan = '" . $GiaBan . "', GiamGia = '$GiamGia' WHERE ID_SanPham= '$_GET[id]' ";
        mysqli_query($mysqli, $sql_fix);
    }
    header('location: ../../index.php?product=list-product');
?>