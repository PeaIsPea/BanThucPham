<?php
include("../../../admin/config/connection.php");
if (isset($_POST['sua']) && isset($_GET['id'])) {
    $ID_ThanhVien = $_GET['id'];
    $HoVaTen = $_POST['HoVaTen'];
    $Email = $_POST['Email'];
    $SoDienThoai = $_POST['SoDienThoai'];
    $DiaChi = $_POST['DiaChi'];
    $partten = "/^[A-Za-z0-9_.]{6,32}@([a-zA-Z0-9]{2,12})(.[a-zA-Z]{2,12})+$/";
    if (!preg_match("/^[0-9]{10,12}$/", $SoDienThoai))
    echo "<script>alert(\"Số điện thoại không hợp lệ!\")</script>";
    else {
      $sql_update = "UPDATE thanhvien set HoVaTen='" . $HoVaTen . "',Email='" . $Email . "',
      DiaChi = '" . $DiaChi . "',  SoDienThoai = '" . $SoDienThoai . "' WHERE ID_ThanhVien= '$ID_ThanhVien'";
      mysqli_query($mysqli, $sql_update);
      echo "<script>alert(\"Cập nhật thông tin cá nhân thành công!\")</script>";
    }
  }
header('location: ../../../index.php?navigate=profile');
?>