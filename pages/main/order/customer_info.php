<?php
$ID_ThanhVien = $_SESSION['ID_ThanhVien'];
$sql_ThanhVien = "SELECT * FROM thanhvien WHERE ID_ThanhVien = $ID_ThanhVien";
$query_ThanhVien = mysqli_query($mysqli,$sql_ThanhVien);
$row= mysqli_fetch_array($query_ThanhVien);
$NguoiNhan = $row['HoVaTen'];
$DiaChi=$row['DiaChi'];
$GiaTien = $_SESSION['allMoney'];
$SoDienThoai = $row['SoDienThoai'];
?>
<div class="container mt-60 bg-white">
    <form action="index.php?navigate=confirm_order" method="POST">
        <p class="pt-3 text-center">NHẬP THÔNG TIN NHẬN HÀNG</p>
        <div class="mt-2">
            <label>Người nhận hàng: </label>
            <input required class="form-control" type="text" name="NguoiNhan" value="<?php echo $NguoiNhan; ?>">
        </div>
        <div class="mt-2">
            <label>Địa chỉ: </label>
            <input required class="form-control" type="text" name="DiaChi" value="<?php echo $DiaChi; ?>">
        </div>
        <div class="mt-2">
            <label>Số điện thoại:</label>
            <input required class="form-control" type="text" name="SoDienThoai" value="<?php echo $SoDienThoai; ?>">
        </div>
        <div class="mt-2">
            <label>Ghi chú:</label>
            <input class="form-control" type="text" name="GhiChu">
        </div>
        <input class="btn btn-success mt-3 mb-3" type="submit" value="Xác nhận">
    </form>
</div>