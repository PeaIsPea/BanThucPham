<?php
    include("../../../admin/config/connection.php");
    session_start();
    $id_cart = $_SESSION['ID_GioHang'];
    if(isset($_GET['id_delete'])){
        $id_delete = $_GET['id_delete'];
        $sql_delete_product = "DELETE FROM chitietgiohang WHERE ID_GioHang = $id_cart AND ID_SanPham = $id_delete";
        $delete_result = mysqli_query($mysqli, $sql_delete_product);
    }
    if(isset($_GET['deleteAll'])){
        $sql_delete_all_products = "DELETE FROM chitietgiohang WHERE ID_GioHang = $id_cart";
        $delete_result = mysqli_query($mysqli, $sql_delete_all_products);
    }
    header('location: ../../../index.php?navigate=cart');
?>