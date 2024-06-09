<?php 
    include("../../config/connection.php"); 
    if (isset($_GET['id_pro'])) {
        $ID_SanPham=$_GET['id_pro'];
        $query_select_image = "SELECT Img FROM sanpham WHERE ID_SanPham = $ID_SanPham";
        $result_select_image = mysqli_query($mysqli, $query_select_image);
        $row_select_image = mysqli_fetch_assoc($result_select_image);
        $imageToDelete = $row_select_image['Img'];
        unlink("../../../assets/image/product/".$imageToDelete);
        $sql_check_product_in_orders = "SELECT * FROM chitietdonhang WHERE ID_SanPham = '".$ID_SanPham."'";
        $result_check_product_in_orders = mysqli_query($mysqli, $sql_check_product_in_orders);
        if (mysqli_num_rows($result_check_product_in_orders) > 0) {
            $sql_check_product_in_cart_details = "SELECT * FROM chitietgiohang WHERE ID_SanPham = '".$ID_SanPham."'";
            $result_check_product_in_cart_details = mysqli_query($mysqli, $sql_check_product_in_cart_details);
            if (mysqli_num_rows($result_check_product_in_cart_details) > 0) {
                while ($row = mysqli_fetch_assoc($result_check_product_in_cart_details)) {
                    $sql_delete_cart_details = "DELETE FROM chitietgiohang WHERE ID_GioHang = '".$row['ID_GioHang']."' AND ID_SanPham = '".$row['ID_SanPham']."'";
                    mysqli_query($mysqli, $sql_delete_cart_details);
                } 
            }
            while ($row = mysqli_fetch_assoc($result_check_product_in_orders)) {
                $sql_delete_order_details = "DELETE FROM chitietdonhang WHERE ID_DonHang = '".$row['ID_DonHang']."' AND ID_SanPham = '".$row['ID_SanPham']."'";
                mysqli_query($mysqli, $sql_delete_order_details);
            }
        }
        $sql_comment = "DELETE FROM binhluan WHERE ID_SanPham='".$ID_SanPham."'";
        mysqli_query($mysqli,$sql_comment);
        $sql="DELETE FROM sanpham WHERE ID_SanPham='".$ID_SanPham."'";
        mysqli_query($mysqli,$sql);
    }
    header('location: ../../index.php?product=list-product');
?>