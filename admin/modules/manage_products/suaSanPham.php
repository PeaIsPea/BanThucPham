<?php
if (isset($_GET['id'])) {
    $ID_SanPham = $_GET['id'];
    $sql_getSanPham = "SELECT * FROM sanpham where ID_SanPham=$ID_SanPham LIMIT 1";
    $query_getSanPham = mysqli_query($mysqli, $sql_getSanPham);
    $row = mysqli_fetch_array($query_getSanPham);
    $sql_DanhMuc="SELECT * FROM danhmuc ORDER BY ID_DanhMuc DESC";
    $query_DanhMuc=mysqli_query($mysqli,$sql_DanhMuc);
    $sql_NCC="SELECT * FROM nhacungcap ORDER BY ID_NCC DESC";
    $query_NCC=mysqli_query($mysqli,$sql_NCC);
}
?>

<div>
    <div id="content" class="container-fluid">
        <div class="card">
            <div class="card-header font-weight-bold">Sửa sản phẩm</div>
            <div class="card-body">
                <form action="modules/manage_products/sua.php?id=<?=$ID_SanPham?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name">Tên sản phẩm</label>
                        <input
                            class="form-control"
                            type="text"
                            name="TenSanPham"
                            value="<?php echo $row['TenSanPham'] ?>"
                        />
                    </div>
                    <div class="form-group">
                        <label for="name">Mô tả</label>
                        <textarea class="form-control" required name="MoTa"><?php echo $row['MoTa'] ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="name">Số lượng</label>
                        <input
                            class="form-control" required
                            type="text"
                            name="SoLuong"
                            value="<?php echo $row['SoLuong'] ?>"
                        />
                    </div>
                    <div class="form-group">
                        <label for="name">Giá bán</label>
                        <input
                            class="form-control" required
                            type="text"
                            name="GiaBan"
                            value="<?php echo $row['GiaBan'] ?>"
                        />
                    </div>
                    <div class="form-group">
                        <label for="name">Giảm giá(%)</label>
                        <input
                            class="form-control" required
                            type="text"
                            name="GiamGia"
                            value="<?php echo $row['GiamGia']?>"
                        />
                    </div>
                    <div class="form-group">
                    <label for="">Danh mục</label>
                    <select class="form-control" required name="danhmuc">
                        <option value="">Chọn danh mục</option>
                        <?php while ($row_DanhMuc=mysqli_fetch_array($query_DanhMuc)){
                        ?>
                        <option value="<?php echo $row_DanhMuc['ID_DanhMuc']?>" name="ID_DanhMuc"><?php echo $row_DanhMuc['TenDanhMuc']?></option>
                    <?php }?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Nhà cung cấp</label>
                    <select class="form-control" required name="nhacungcap">
                        <option value="">Chọn nhà cung cấp</option>
                        <?php while ($row_NCC=mysqli_fetch_array($query_NCC)){
                        ?>
                        <option value="<?php echo $row_NCC['ID_NCC']?>" name="ID_NCC"><?php echo $row_NCC['TenNCC']?></option>
                    <?php }?>
                    </select>
                </div>
                    <div class="form-group">
                        <label for="formFile">Hình ảnh</label>
                        <img
                            style="width: 240px;height: 240px;object-fit: cover;object-position: center center;"
                            src="../assets/image/product/<?php echo $row['Img'] ?>"
                        />
                        <input
                            class="form-control"
                            type="file"
                            name="image"
                            accept="image/*"
                        />
                    </div>
                    <input
                        type="submit"
                        class="btn btn-primary"
                        name="submit"
                        value="Sửa"
                    />
                </form>
            </div>
        </div>
    </div>
</div>
