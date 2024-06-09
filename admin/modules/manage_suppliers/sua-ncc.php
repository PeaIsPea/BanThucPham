<?php
include("config/connection.php"); 
if (isset($_GET['id_NCC'])) {
    $ID_NCC = $_GET['id_NCC'];
    $sql_getNCC = "SELECT * FROM nhacungcap where ID_NCC=$ID_NCC";
    $query_getNCC = mysqli_query($mysqli, $sql_getNCC);
    $row = mysqli_fetch_array($query_getNCC);
}
?>
            <div>
                <div id="content" class="container-fluid">
                    <div class="card">
                        <div class="card-header font-weight-bold">
                            Sửa thông tin nhà cung cấp
                        </div>
                        <div class="card-body">
                            <form method="POST" action="modules/manage_suppliers/sua.php?id_NCC=<?php echo $ID_NCC?>" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="name">Tên nhà cung cấp:</label>
                                    <input required class="form-control" type="text" name="name" id="name"
                                        value="<?php echo $row['TenNCC'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="name">Mô tả:</label>
                                    <textarea name="MoTa" class="form-control"><?php echo $row['MoTa'] ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="name">Email:</label>
                                    <input required class="form-control" type="text" name="email" id="name"
                                        value="<?php echo $row['Email'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="name">Số điện thoại:</label>
                                    <input required class="form-control" type="text" name="SoDienThoai" id="name"
                                        value="<?php echo $row['SoDienThoai'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="name">Địa chỉ:</label>
                                    <input required class="form-control" type="text" name="DiaChi" id="name"
                                        value="<?php echo $row['DiaChi'] ?>">
                                </div>
                                <div class="form-group">
                                <label for="formFile">Hình ảnh</label>
                                <img
                                    style="width: 240px;height: 240px;object-fit: cover;object-position: center center;"
                                    src="../assets/image/supplier/<?php echo $row['Img'] ?>"
                                />
                                <input
                                    class="form-control"
                                    type="file"
                                    name="image"
                                    accept="image/*"
                                />
                            </div>
                                <input type="submit" class="btn btn-primary" name="submit" value="Sửa">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
 