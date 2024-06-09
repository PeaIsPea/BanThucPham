<?php 
$sql_category_product="SELECT * FROM danhmuc ORDER BY ID_DanhMuc ASC";
$query_category_product=mysqli_query($mysqli,$sql_category_product);
?>
  <div id="content" class="container-fluid">
    <div class="row">
        <div class="col-4">
            <div class="card">
                <div class="card-header font-weight-bold">
                    Thêm danh mục
                </div>
                <div class="card-body">
                    <form action="modules/manage_categories/add-cat.php" method="POST">
                        <div class="form-group">
                            <label for="name">Tên danh mục</label>
                            <input class="form-control" type="text" name="name" id="name" required>
                        </div>
                        <div class="form-group">
                            <label for="name">Mô Tả</label>
                            <textarea  class="form-control" type="text" name="Mota" id="name"></textarea>
                        </div>
                        <input type="submit" class="btn btn-success" name="add" value="Thêm mới">
                    </form>
                </div>
            </div>
        </div>
        <div class="col-8">
            <div class="card">
                <div class="card-header font-weight-bold">
                    Danh sách
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">ID</th>
                                <th scope="col">Tên</th>
                                <th scope="col">Mô Tả</th>
                                <th scope="col">Sửa/Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=0;
                            while ($row_category_product=mysqli_fetch_array($query_category_product)) {
                                $i++;
                                ?>
                                <tr>
                                    <th scope="row"><?php echo $i?></th>
                                    <td><?php echo $row_category_product['ID_DanhMuc']?></td>
                                    <td><?php echo $row_category_product['TenDanhMuc']?></td>
                                    <td><?php echo $row_category_product['Mota']?></td>
                                    <td class="d-flex">
                                        <a href="?cat=fix-cat&id=<?php echo $row_category_product['ID_DanhMuc']?>" class="btn btn-success btn-sm text-white mr-2" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                        <a href="modules/manage_categories/delete-cat.php?id=<?php echo $row_category_product['ID_DanhMuc']?>" class="btn btn-danger btn-sm text-white" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                                    </td>

                                </tr>
                            <?php }?>     
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>