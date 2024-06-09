<?php
  $ID_ThanhVien = $_SESSION['ID_ThanhVien'];
  $id_cart = $_SESSION['ID_GioHang'];
  $sql_cart = "SELECT * FROM giohang WHERE giohang.ID_GioHang = $id_cart";
  $query_cart = mysqli_query($mysqli, $sql_cart);
  $row = mysqli_fetch_array($query_cart);
  $sql_cart_detail = "SELECT chitietgiohang.ID_SanPham, chitietgiohang.SoLuong,
    sanpham.TenSanPham, sanpham.GiaBan, sanpham.GiamGia
    FROM giohang
    INNER JOIN chitietgiohang ON giohang.id_GioHang = chitietgiohang.id_GioHang
    INNER JOIN sanpham ON chitietgiohang.ID_SanPham = sanpham.id_sanpham
    WHERE giohang.ID_GioHang = $id_cart";
  $query_cart_detail = mysqli_query($mysqli, $sql_cart_detail);
  $_SESSION['NguoiNhan'] = $_POST['NguoiNhan'];
  $_SESSION['DiaChi'] = $_POST['DiaChi'];
  $_SESSION['SoDienThoai'] = $_POST['SoDienThoai'];
  $_SESSION['GhiChu'] = $_POST['GhiChu'];
  $tongtien_vnd = isset($_SESSION['allMoney']) ? $_SESSION['allMoney'] : 0;
?>

<div class="container">
    <div class="row">
      <div class="col-lg-8 mt-5">
        <table class="table-bordered w-100" cellpadding="5px">           
          <tr class="text-center">
            <td colspan="4"><h4>ĐƠN HÀNG</h4></td>
          </tr>
          <tr>
            <td colspan="4">Người nhận: <?php echo $_SESSION['NguoiNhan'] ?></td>
          </tr>
          <tr>
            <td colspan="2">Địa chỉ: <?php echo $_SESSION['DiaChi'] ?></td>
            <td colspan="2">Số điện thoại: <?php echo $_SESSION['SoDienThoai'] ?></td>
          </tr>
          <tr>
            <td colspan="4">Ghi chú: <?php echo $_SESSION['GhiChu'] ?></td>
          </tr>
            <tr class="text-center">
              <th scope="col">STT</th>
              <th scope="col">Tên sản phẩm</th>
              <th scope="col">Số lượng</th>
              <th scope="col">Giá mua</th>
            </tr>
              <?php 
              $i=0; 
              $allMoney = 0;
              while($row_detail = mysqli_fetch_assoc($query_cart_detail)) {
                $i++;
              ?>
                <tr class="text-center">
                  <td><?= $i?></td>
                  <td>
                    <?= $row_detail['TenSanPham'] ?>
                  </td>
                  <td>
                    <?= $row_detail['SoLuong'] ?>
                  </td>
                  <td>
                    <?= number_format($row_detail['GiaBan'] *(100 - $row_detail['GiamGia'])/ 100,0,',','.') ?> Đồng/Kg
                  </td>
                </tr>
              <?php 
              $Money = (int)$row_detail['SoLuong'] * (int)$row_detail['GiaBan'] * (100-$row_detail['GiamGia'])/100;
              $allMoney += $Money;
              } 
              ?>
              <tr>
                <th colspan="5">Tổng tiền:  <?= number_format($allMoney,0,',','.') ?> VND</th>
              </tr>
        </table>
        <a class="mt-5 btn btn-danger" href="index.php?navigate=cart">Quay lại giỏ hàng</a>
      </div>
      <div class="col-lg-4 mt-5">
      <div>
          <form method="POST" action="pages/main/order/xulythanhtoan.php">
              <p class="mt-2 text-center">HÌNH THỨC THANH TOÁN</p>
              <input class="d-block btn btn-success mt-3 w-100" type="submit" name="cod" value="Thanh toán khi nhận hàng">
              <input class="d-block btn btn-danger mt-3 w-100" type="submit" name="bank" value="Chuyển khoản">
              <input class="d-block btn btn-primary mt-3 w-100" type="submit" name="vnpay" value="Thanh toán qua VNPAY">
          </form>
          <form method="POST" target="_blank" enctype="application/x-www-form-urlencoded"
                          action="pages/main/order/xulythanhtoanmomo.php">
            <input type="hidden" name="tongtien_vnd" value="<?php echo $tongtien_vnd?>">
            <input class="btn text-light mt-3 w-100" style="background-color: #ae2170; border-color: #ae2170;" type="submit" value="Thanh toán qua MOMO QRCode">              
          </form>
          <form method="POST" target="_blank" enctype="application/x-www-form-urlencoded"
                          action="pages/main/order/xulythanhtoanmomo_atm.php">
            <input type="hidden" name="tongtien_vnd" value="<?php echo $tongtien_vnd?>">
            <input class="btn text-light mt-3 w-100" style="background-color: #ae2170; border-color: #ae2170;" type="submit" value="Thanh toán qua MOMO ATM">              
          </form>
        </div>
      </div>
  </div>
</div>