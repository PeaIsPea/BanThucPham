<?php
if (isset($_GET['id'])) {
    $ID_DanhMuc = $_GET['id'];
    $sql_getDanhMuc = "SELECT * FROM danhmuc where ID_DanhMuc=$ID_DanhMuc LIMIT 1";
    $query_getDanhMuc = mysqli_query($mysqli, $sql_getDanhMuc);
    $row = mysqli_fetch_array($query_getDanhMuc);
}
?>
            <div>
                <div id="content" class="container-fluid">
                    <div class="card">
                        <div class="card-header font-weight-bold">
                            Chỉnh sửa thông tin danh mục
                        </div>
                        <div class="card-body">
                            <form action="modules/manage_categories/sua.php?id=<?php echo $ID_DanhMuc ?>" method="POST">
                                <div class="form-group">
                                    <label for="name">Tên danh mục</label>
                                    <input required class="form-control" type="text" name="TenDanhMuc" id="name"
                                        value="<?php echo $row['TenDanhMuc'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="name">Mô tả</label>
                                    <textarea required class="form-control" type="text" name="Mota"
                                        id="name"><?php echo $row['Mota'] ?></textarea>
                                </div>

                                <input type="submit" class="btn btn-primary" name="submit" value="Sửa">
                            </form>
                        </div>
                    </div>
                </div>
            </div>