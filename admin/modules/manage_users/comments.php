<?php 
    $sql_comment="SELECT * FROM binhluan";
    $query_comment=mysqli_query($mysqli,$sql_comment);
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
                        <th scope="col">ID thành viên</th>
                        <th scope="col">ID sản phẩm</th>
                        <th scope="col">Nội dung</th>
                        <th scope="col">Thời gian</th>
                        <th scope="col">Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $i =0;
                    while($row_comment=mysqli_fetch_array($query_comment)){
                    $i++;
                    ?>
                    <tr>
                        <th scope="row"><?php echo $i ?></th>
                        <td><?php echo $row_comment['ID_ThanhVien'] ?></td>
                        <td><?php echo $row_comment['ID_SanPham'] ?></td>
                        <td><?php echo $row_comment['NoiDung'] ?></td>
                        <td><?php echo $row_comment['ThoiGianBinhLuan'] ?></td>
                        <td>
                            <a href="modules/manage_users/delete-comment.php?id=<?php echo $row_comment['ID_BinhLuan']?>" class="btn btn-danger btn-sm rounded text-white" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</div>