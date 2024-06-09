<?php
if (isset($_SESSION['ID_ThanhVien'])) {
    $id_cus = $_SESSION['ID_ThanhVien'];
}
$sql_product = "SELECT * FROM sanpham  where ID_SanPham='$_GET[id_product]' ORDER BY ID_SanPham DESC";
$query_product = mysqli_query($mysqli, $sql_product);
$row_product = mysqli_fetch_array($query_product);
$sql_comment = "SELECT * FROM binhluan,thanhvien 
where binhluan.ID_SanPham='$_GET[id_product]' and binhluan.ID_ThanhVien=thanhvien.ID_ThanhVien";
$query_comment = mysqli_query($mysqli, $sql_comment);
$id_ncc = $row_product['ID_NhaCungCap'];
$sql_ncc = "SELECT * FROM nhacungcap where nhacungcap.ID_NCC = '$id_ncc'";
$query_ncc = mysqli_query($mysqli, $sql_ncc);
$row_ncc = mysqli_fetch_array($query_ncc);
?>

    <main role="main">
        <div class="container">
                    <form name="frmsanphamchitiet" id="frmsanphamchitiet" method="post"
                        action="pages/main/cart/add.php?id=<?php echo $row_product['ID_SanPham']; ?>">
                        <input type="hidden" name="sp_ten" id="sp_ten" value="<?php echo $row_product['TenSanPham']; ?>">
                        <input type="hidden" name="sp_gia" id="sp_gia" value="<?php echo $row_product['GiaBan']; ?>">
                        <input type="hidden" name="hinhdaidien" id="hinhdaidien"
                            
                            value="<?php echo $row_product['Img']; ?>">
                        <h1 class="text-center">
                            <?php echo $row_product['TenSanPham']; ?>
                        </h1>
                        <div class="row">
                            <div class="col-lg-5" id="pic-3">
                               <div class="card">
                               <img  src="./assets/image/product/<?php echo $row_product['Img'];?>"
                               style="display: block; width: 100%; height: 360px; object-fit: cover; object-position: center center;"
                               >
                               </div>
                            </div>
                            <div class="col-lg-3 p-3">
                                <h5 class="text-center">Thông tin</h5>
                                <hr>
                                <h6>Giá hiện tại: <?php echo number_format($row_product['GiaBan'],0,',','.')?> VND/Kg</h6>
                                <h6>Giảm giá: <?php echo -$row_product['GiamGia']?>%</h6>
                                <h6>Giá cuối: <?php echo number_format($row_product['GiaBan'] *(100 - $row_product['GiamGia'])/ 100,0,',','.')?> VND/Kg</h6>
                                <p><i>Miễn phí giao hàng</i></p>
                                <?php if (isset($_SESSION['TenDangNhap'])) {
                                    ?>
                                    <div class="form-group">
                                        <label for="soluong"><b>Số lượng:</b></label>
                                        <input type="number" class="form-control" id="soluong" name="soluong" value="1">
                                    </div>
                                    <?php if($row_product['SoLuong'] > 0 ){?>
                                    <div>
                                        <input type="submit" class="btn btn-success" name='mua' value="Thêm vào giỏ hàng">
                                    </div>
                                    <?php } else{?>
                                        <p class="text-danger">Sản phẩm tạm thời hết hàng</p>
                                    <?php
                                    }
                                }
                                ?>
                            </div>
                            <div class="col-lg-4">
                                <div class="card p-3">
                                <h5 class="text-center">Mô tả</h5>
                                <hr>
                                <p>
                                    <?php echo $row_product['MoTa']; ?>
                                </p>
                                <h5 class="text-center">Nhà cung cấp</h5>
                                <hr>
                                <p><?php echo $row_ncc['TenNCC']; ?></p>
                                <p>Địa chỉ: <?php echo $row_ncc['DiaChi']; ?></p>
                                <p>SĐT: <?php echo $row_ncc['SoDienThoai']; ?></p>
                                <p>Email: <?php echo $row_ncc['Email']; ?></p>
                                </div>
                            </div>
                        </div>
                    </form>
            </div>
        <div class="container mt-60">
            <h3>Bình luận về sản phẩm</h3>
            <form class="form-floating"
                action="pages/main/product/comment.php?id_product=<?php echo $row_product['ID_SanPham']; ?>"
                method="POST">
                <?php
                    $i = 0;
                    while ($row_comment = mysqli_fetch_array($query_comment)) {
                        $i++;
                        ?>
                        <div class="alert alert-success" role="alert">
                        <small><label for="floatingInputValue" class="font-weight-bold">
                        <?php echo $row_comment['HoVaTen']; ?>
                        </label>
                        <label for="floatingInputValue">
                        <?php echo $row_comment['ThoiGianBinhLuan']; ?>
                        </label>
                        </small>
                        </br>
                        <label for="floatingInputValue">
                        <?php echo $row_comment['NoiDung']; ?>
                        </label>
                        </div>
                        <?php
                    }
                    ?>
                <?php if (isset($_SESSION['TenDangNhap'])) {
                    ?>
                    <div class="form">
                        <textarea class="form-control" placeholder="Hãy bình luận sản phẩm tại đây"
                        id="floatingTextarea2" name="NoiDung" style="height: 100px"></textarea>
                        </br>
                    </div>
                    <div class="action">
                        <input type="submit" class="btn btn-success" name='comment' value="Bình luận"
                            style="float:right">
                    </div>
                <?php
                }
                ?>
             </form>
        </div>      
    </main>