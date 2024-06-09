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
  if(isset($_POST['desc'])){
    $sql_product = "SELECT * FROM sanpham ORDER BY GiaBan * (100 - GiamGia)/100 DESC LIMIT $begin,8";
  }
  else if(isset($_POST['asc'])){
    $sql_product = "SELECT * FROM sanpham ORDER BY GiaBan * (100 - GiamGia)/100 ASC LIMIT $begin,8";
  }
  else if(isset($_POST['hot'])){
    $sql_product = "SELECT *
    FROM sanpham
    WHERE ID_SanPham IN (
        SELECT ID_SanPham
        FROM chitietdonhang
        GROUP BY ID_SanPham
        ORDER BY SUM(SoLuong) DESC
    )";
  }
  else if(isset($_POST['saleoff'])){
    $sql_product = "SELECT * FROM sanpham ORDER BY GiamGia DESC LIMIT $begin,8";
  }
  else {
    $sql_product = "SELECT * FROM sanpham ORDER BY ID_SanPham DESC LIMIT $begin,8";
  }
  $query_product = mysqli_query($mysqli,$sql_product);
?>
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-2 category-list">
        <?php include('pages/main/product/categoryList.php')?>
      </div>
      <div class="container-fluid col-lg-10">
        <h2 class="text-center">Tất cả sản phẩm</h2>
        <div>
          <form action="" method="POST">
            <ul class="nav">
              <li class="nav-item mr-2 mb-2"><p class="btn btn-success">Sắp sếp theo:</p></li>
              <li class="nav-item mr-2 mb-2"><input class="btn btn-info" type="submit" value="Bán chạy" name="hot"></li>
              <li class="nav-item mr-2 mb-2"><input class="btn btn-info" type="submit" value="Giá giảm dần" name="desc"></li>
              <li class="nav-item mr-2 mb-2"><input class="btn btn-info" type="submit" value="Giá tăng dần" name="asc"></li>
              <li class="nav-item mr-2 mb-2"><input class="btn btn-info" type="submit" value="Giảm giá nhiều nhất" name="saleoff"></li>
            </ul>
          </form>
        </div>
        <div class="row min-height-100">
        <?php
        while($row_product = mysqli_fetch_array($query_product)){
        ?>    
        <form class="col-lg-3 col-md-4 col-sm-6" action="./index.php?navigate=productInfo&id_product=<?php echo $row_product['ID_SanPham'];?>" method="POST">
          <div class="card text-center mb-4" style="height: 430px;">
            <img class="card-img-top product-img" src="./assets/image/product/<?php echo $row_product['Img'];?>"/>
            <div class="card-body">
              <h5>
                  <?php echo $row_product['TenSanPham']; ?>
              </h5>
              <h6 class="text-danger"><s><?php echo number_format($row_product['GiaBan'],0,',','.')?> VND</s> <sup class="badge badge-danger"><?php echo -$row_product['GiamGia']?>%</sup></h6>
              <h6><?php echo number_format($row_product['GiaBan'] *(100 - $row_product['GiamGia'])/ 100,0,',','.')?> VND</h6>
              <?php if(isset($_SESSION['TenDangNhap'])) { 
                ?>
              <input type="submit" class="btn btn-info" name='submit' value="Mua">  
              <?php }else{ ?>
              <input type="submit" class="btn btn-info" name='submit' value="Xem chi tiết">
              <?php 
              } 
              ?>
            </div>        
          </div>
        </form>
        <?php
        }
        ?>
      </div>
				<?php
				$sql_trang = mysqli_query($mysqli, "SELECT * FROM sanpham");
				$row_count = mysqli_num_rows($sql_trang);  
				$trang = ceil($row_count/8);
				?>				
				<ul class="d-flex justify-content-center list-unstyled">
					<?php
					  for($i=1;$i<=$trang;$i++){ 
					?>
						<li class="m-1 bg-white" <?php if($i==$page){echo 'style="background: #ccc !important;"';}else{ echo '';}?>>
            <a class="d-block p-2 text-dark" href="index.php?navigate=showProducts&trang=<?php echo $i ?>"><?php echo $i ?></a>
            </li>
					<?php
					} 
					?>
				</ul>
      </div>
    </div>
  </div>
