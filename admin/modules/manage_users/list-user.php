<?php 
    $sql_Customer="SELECT * FROM thanhvien ORDER BY ID_ThanhVien DESC";
    $query_Customer=mysqli_query($mysqli,$sql_Customer);
?>
<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
            <h5 class="m-0 ">Danh sách tài khoản</h5>
        </div>
        <div class="card-body">
            <table class="table table-striped table-checkall">
                <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Họ tên</th>
                        <th scope="col">Địa chỉ</th>
                        <th scope="col">SĐT</th>
                        <th scope="col">Đăng ký</th>
                        <th scope="col">Tên ĐN</th>
                        <th scope="col">Mật khẩu</th>
                        <th scope="col">Sửa/Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $i =0;
                    while($row_Customer=mysqli_fetch_array($query_Customer)){
                    $i++;
                    ?>
                    <tr>
                        <th scope="row"><?php echo $i ?></th>
                        <td><?php echo $row_Customer['HoVaTen'] ?></td>
                        <td><?php echo $row_Customer['DiaChi'] ?></td>
                        <td><?php echo $row_Customer['SoDienThoai'] ?></td>
                        <td><?php echo $row_Customer['NgayDangKi'] ?></td>
                        <td><?php echo $row_Customer['TenDangNhap'] ?></td>
                        <td><?php echo $row_Customer['MatKhau'] ?></td>
                        <td class="d-flex">
                            <a href="?user=change-user-info&id=<?php echo $row_Customer['ID_ThanhVien']?>" class="btn btn-success btn-sm rounded text-white mr-2" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                            <a href="modules/manage_users/delete-user.php?id=<?php echo $row_Customer['ID_ThanhVien']?>" class="btn btn-danger btn-sm rounded text-white" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
              <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</div>