<?php
if (isset($_GET['id'])) {
    $ID_ThanhVien = $_GET['id'];
    $sql_getUser = "SELECT * FROM thanhvien where ID_ThanhVien=$ID_ThanhVien";
    $query_getUser = mysqli_query($mysqli, $sql_getUser);
    $row = mysqli_fetch_array($query_getUser);
}
?>
            <div>
                <div id="content" class="container-fluid">
                    <div class="card">
                        <div class="card-header font-weight-bold">
                            Chỉnh sửa thông tin người dùng
                        </div>
                        <div class="card-body">
                            <form action="modules/manage_users/change.php?id=<?= $ID_ThanhVien?>" method="POST">
                                <div class="form-group">
                                    <label for="name">Họ và tên</label>
                                    <input required class="form-control" type="text" name="HoVaTen" id="name"
                                        value="<?php echo $row['HoVaTen'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="name">Địa chỉ</label>
                                    <input required class="form-control" type="text" name="DiaChi" id="name"
                                        value="<?php echo $row['DiaChi'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="name">Số điện thoại</label>
                                    <input required class="form-control" type="text" name="SoDienThoai" id="name"
                                        value="<?php echo $row['SoDienThoai'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="name">Mật khẩu: </label>
                                    <input class="form-control" type="text" name="MatKhau" id="name">
                                </div>
                                <input type="submit" class="btn btn-primary" name="submit" value="Sửa">
                            </form>
                        </div>
                    </div>
                </div>
            </div>