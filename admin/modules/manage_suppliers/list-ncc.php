<?php 
    $sql_NCC="SELECT * FROM nhacungcap ORDER BY ID_NCC";
    $query_NCC=mysqli_query($mysqli,$sql_NCC);
?>
<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
            <h5 class="m-0 ">Danh sách nhà cung cấp</h5>
            <div class="form-search form-inline">
            </div>
        </div>
        <div class="card-body">
           
            
            <table class="table table-striped table-checkall">
                <thead>
                    <tr>
                      
                        <th scope="col">STT</th>
                        <th scope="col">Tên nhà cung cấp</th>
                        <th scope="col">Email</th>
                        <th scope="col">SĐT</th>
                        <th scope="col">Địa chỉ</th>
                        <th scope="col">Sửa/Xóa</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $i=0;
                    while ($row=mysqli_fetch_array($query_NCC)) {
                    $i++;
                ?>
                    <tr>
                        <td scope="row"><?php echo $i; ?></td>
                        <td><?php echo $row['TenNCC']?></td>
                        <td><?php echo $row['Email']?></td>
                        <td><?php echo $row['SoDienThoai']?></td>
                        <td><?php echo $row['DiaChi']?></td>
                        <td class="d-flex">
                            <a href="?ncc=sua-ncc&id_NCC=<?php echo $row['ID_NCC']?>" class="btn btn-success btn-sm text-white mr-2" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                            <a href="modules/manage_suppliers/delete-ncc.php?id_NCC=<?php echo $row['ID_NCC']?>" class="btn btn-danger btn-sm text-white" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                        </td>

                    </tr>
                <?php }?>

                </tbody>
            </table>
        </div>
    </div>
</div>