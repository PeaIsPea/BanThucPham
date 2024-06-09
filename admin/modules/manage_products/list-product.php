<?php 
    if(isset($_GET['trang'])){
        $page = $_GET['trang'];
    } else{
        $page = 1;
    }
    if($page == '' || $page == 1){
        $begin = 0;
    } else{
        $begin = ($page*8)-8;
    }
    $sql_product="SELECT 
    sanpham.ID_SanPham,	
    sanpham.ID_DanhMuc,		
    sanpham.TenSanPham,	
    sanpham.MoTa,	
    sanpham.GiaBan,	
    sanpham.SoLuong,	
    sanpham.Img AS sanPhamImg,	
    sanpham.GiamGia, nhacungcap.TenNCC FROM sanpham LEFT JOIN nhacungcap ON sanpham.ID_NhaCungCap = nhacungcap.ID_NCC ORDER BY sanpham.ID_SanPham DESC LIMIT $begin,8";
    if (isset($_POST['tukhoa'])) {
        $tukhoa= $_POST['tukhoa'];
        $sql_product="SELECT 
        sanpham.ID_SanPham,	
        sanpham.ID_DanhMuc,		
        sanpham.TenSanPham,	
        sanpham.MoTa,	
        sanpham.GiaBan,	
        sanpham.SoLuong,	
        sanpham.Img AS sanPhamImg,	
        sanpham.GiamGia, nhacungcap.TenNCC FROM sanpham LEFT JOIN nhacungcap ON sanpham.ID_NhaCungCap = nhacungcap.ID_NCC where sanpham.TenSanPham LIKE '%".$tukhoa."%'";
    }
    $query_product=mysqli_query($mysqli,$sql_product);
?>

<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
            <h5 class="text-danger m-0 ">Danh sách sản phẩm</h5>
            <div class="form-search form-inline">
                <form action="" method="POST" class="d-flex">
                    <input type="text" class="form-control form-search" placeholder="Tìm kiếm" name="tukhoa">
                    <input type="submit" name="btn-search" value="Tìm kiếm" class="btn btn-primary" name="tim">
                </form>
            </div>
        </div>
        <div class="card-body">
            <div class="tableInfo">
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">STT</th>
                        <th scope="col">ID</th>
                        <th scope="col">Tên</th> 
                        <th scope="col">Nhà cung cấp</th> 
                        <th scope="col">SL</th>
                        <th scope="col">Hình ảnh</th>
                        <th scope="col">Giá</th>
                        <th scope="col">Thao tác</th>
                    </tr>
                </thead>
                        <?php
                        $i=0;
                        while ($row= mysqli_fetch_array($query_product)){
                            $i++; 
                            ?>

                            <tbody>
                                <td><?php echo $i ?></td> 
                                <td><?php echo $row['ID_SanPham'];?></td>  
                                <td><?php echo $row['TenSanPham'];?></td>
                                <td><?php echo $row['TenNCC'];?></td>
                                <td><?php echo $row['SoLuong'];?></td>        
                                <td> <img style="width: 180px;height: 180px;object-fit: cover;object-position: center center;" src="../assets/image/product/<?php echo $row['sanPhamImg'];?>"/></td>    
                                <td><?php echo $row['GiaBan'];?></td>
                                <td>
                                    <a class="btn btn-danger" href="modules/manage_products/delete-product.php?id_pro=<?php echo $row['ID_SanPham'];?>">Xóa</a> 
                                    <a class="btn btn-warning" href="?product=suaSanPham&id=<?php echo $row['ID_SanPham'];?>">Sửa</a>
                                </td>   
                            </tbody> 
                        <?php
                        }
                    ?>
                </table>
            </div>      
            <?php
            if(!isset($_POST['tukhoa'])) {
            $sql_trang = mysqli_query($mysqli, "SELECT * FROM sanpham");
            $row_count = mysqli_num_rows($sql_trang);  
            $trang = ceil($row_count/8);
            ?>				
            <ul class="d-flex justify-content-center list-unstyled">
                <?php
                  for($i=1;$i<=$trang;$i++){ 
                ?>
                    <li class="p-2 m-1 bg-white" <?php if($i==$page){echo 'style="background: #ccc !important;"';}else{ echo '';}?>>
                        <a class="text-dark" href="index.php?product=list-product&trang=<?php echo $i ?>"><?php echo $i ?></a>
                    </li>
                <?php
                } 
            }
                ?>
            </ul>
        </div>
    </div>
</div>