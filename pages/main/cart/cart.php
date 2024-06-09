<?php
$id_cus = $_SESSION['ID_ThanhVien'];
$sql_cart = "SELECT sanpham.ID_SanPham, chitietgiohang.SoLuong, sanpham.Img, sanpham.TenSanPham, sanpham.GiaBan, sanpham.GiamGia
FROM giohang
INNER JOIN chitietgiohang ON giohang.id_GioHang = chitietgiohang.id_GioHang
INNER JOIN sanpham ON chitietgiohang.ID_SanPham = sanpham.id_sanpham
WHERE giohang.ID_ThanhVien = $id_cus";
$query_cart = mysqli_query($mysqli, $sql_cart);
?>

<div class="container min-height-100">
    <h1 class="text-center">Giỏ hàng</h1>
    <div>
      <?php
      if (isset($_SESSION['ID_ThanhVien'])) {
        ?>
        <form method="POST" action="index.php?navigate=customer_info">
            <?php
            if (mysqli_num_rows($query_cart) > 0) {
              $i = 0;
              $allMoney = 0;
              $allAmount = 0;
              ?>
          <table class="bg-white table-bordered w-100" cellpadding="5px">           
              <thead>
              <tr class="text-center">
                <th scope="col">STT</th>
                <th scope="col">Tên sản phẩm</th>
                <th scope="col">Hình ảnh</th>
                <th scope="col">Số lượng</th>
                <th scope="col">Giá bán</th>
                <th scope="col">Tùy chọn</th>
              </tr>
              </thead>
              <tbody>
                <?php while($row = mysqli_fetch_array($query_cart)) {
                  $i++;
                  ?>
                  <tr class="text-center">
                    <td>
                      <?= $i ?>
                    </td>
                    <td>
                      <?= $row['TenSanPham'] ?>
                    </td>
                    <td><img class="product-img" style="width: 260px" src="./assets/image/product/<?= $row['Img'] ?>"></td>
                    <td>
                      <a class="text-dark" href="pages/main/cart/change.php?change=plus&id=<?= $row['ID_SanPham']?>"><i class="fa fa-plus"></i></a>
                      <?= $row['SoLuong'] ?>
                      <a class="text-dark" href="pages/main/cart/change.php?change=minus&id=<?= $row['ID_SanPham']?>"><i class="fa fa-minus"></i></a>
                    </td>
                    <td>
                      <?= number_format($row['GiaBan'] *(100 - $row['GiamGia'])/ 100,0,',','.') ?> VND
                    </td>
                    <td>
                      <a class="mr-2 ml-2" href="pages/main/cart/delete.php?id_delete=<?= $row['ID_SanPham'] ?>">Xóa</a>
                    </td>
                  </tr>
                  <?php
                $Money = (int)$row['SoLuong'] * (int)$row['GiaBan'] * (100-$row['GiamGia'])/100;
                $amount = $row['SoLuong'];
                $allMoney += $Money;
                $allAmount += (int)$amount;
              }
              ?>
              </tbody>
            <tr>
              <th colspan="3">Tổng tiền: <?= number_format($allMoney,0,',','.') ?> VND</th>
              <th colspan="2">Tổng số lượng: <?= $allAmount ?></th>
              <td>
                <a class="btn btn-danger w-100" href="pages/main/cart/delete.php?deleteAll">Xóa hết</a>
              </td>              
            </tr>
            <tr>
              <td class="w-100" colspan="7">
                <input type="submit" class="btn btn-success w-100" name='submit' value="Đặt hàng">
              </td>
            </tr>
          </table>
          <?php
            $_SESSION['allMoney'] = $allMoney;
            $_SESSION['allAmount'] = $allAmount;
          } else {
          ?>
          <h4 class="text-center">Không có sản phẩm trong giỏ hàng</h4>
          <?php
          }                       
          ?>
      </form>
      <?php
      } else {
        ?>
      <h4 class="text-center">Vui lòng đăng nhập để xem giỏ hàng!</h4>
      <?php
      }
      ?>
  </div>  
</div>