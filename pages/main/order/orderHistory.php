<?php
if (isset($_SESSION['ID_ThanhVien'])) {
  $ID_ThanhVien=$_SESSION['ID_ThanhVien'];
  $sql_getOrder="SELECT * FROM donhang where donhang.ID_ThanhVien=$ID_ThanhVien order by ID_DonHang DESC";
  $query_getOrder=mysqli_query($mysqli,$sql_getOrder);
}
?>

<div class="container min-height-100">
  <div class="row">
  <div class="col-md-12 mt-3">
    <h2 class="text-center">Danh sách đơn hàng</h2>
    <table cellpadding="5px" class="table-bordered w-100 bg-white">
    <thead>
      <tr class="text-center">
        <th scope="col">STT</th>
        <th scope="col">Mã ĐH</th>
        <th scope="col">Người nhận</th>
        <th scope="col">Thời gian đặt</th> 
        <th scope="col">Giá tiền</th> 
        <th scope="col">Trạng thái</th>
        <th scope="col">Chi tiết</th> 
      </tr>
    </thead>
      <tbody>
      <?php
      if (isset($_SESSION['ID_ThanhVien'])) {
        $i=0;
      while($row_getOrder = mysqli_fetch_array($query_getOrder)){
        $i++;
        if($row_getOrder['XuLy'] == 0) {$trangThai = "Chưa duyệt"; $style = "text-warning";}
        else if($row_getOrder['XuLy'] == 1) {$trangThai = "Đã duyệt"; $style = "text-success";}
        else {$trangThai = "Đã hủy"; $style = "text-danger";}
      ?>
          <td><?php echo $i ?></td>
          <td><?php echo $row_getOrder['ID_DonHang']; ?></td> 
          <td><?php echo $row_getOrder['NguoiNhan']; ?></td> 
          <td><?php echo $row_getOrder['ThoiGianLap']; ?></td> 
          <td><?php echo number_format($row_getOrder['GiaTien'],0,',','.') ?> VND</td>
          <td class="<?php echo $style?>"><?php echo $trangThai ?></td>
          <td>
            <a href="index.php?navigate=order_detail&id=<?php echo $row_getOrder['ID_DonHang']; ?>">Xem</a>
          </td>
    </tbody>
    <?php
        }
      }else{
        ?>
        <h4>Không có lịch sử đặt hàng</h4>
        <?php
      }
    ?>
  </table>
  </div>
  </div>
</div>
