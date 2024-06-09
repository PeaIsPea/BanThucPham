<?php
	if (isset($_POST['tukhoa']) && isset($_POST['timkiem'])) {
		$tukhoa = $_POST['tukhoa'];
    $sql = "SELECT * FROM sanpham WHERE ID_SanPham = '$tukhoa'";
    $result = mysqli_query($mysqli, $sql);
    if (mysqli_num_rows($result) > 0) {
      $query_search = mysqli_query($mysqli, $sql);
    } else {     
      $sql_search = "SELECT * FROM sanpham where sanpham.TenSanPham LIKE 
      '%" . $tukhoa . "%'";
      $query_search = mysqli_query($mysqli, $sql_search); 
    }
	  }
?>

<div class="container-fluid">
	<div class="row">
	  <div class="col-lg-2 category-list">
      <?php include('pages/main/product/categoryList.php')?>
    </div>
    <div class="coitainer col-lg-10">
      <h1 class="text-center">Kết quả tìm kiếm</h1>
      <div class="row min-height-100">
      <?php
        if (isset($_POST['tukhoa'])) {
          ?>
            <?php
            while ($row_search = mysqli_fetch_array($query_search)) {
              ?>
              <form class="col-lg-3 col-md-4 col-sm-6" action="./index.php?navigate=productInfo&id_product=<?php echo $row_search['ID_SanPham'];?>" method="POST">
                <div class="card text-center mb-4" style="height: 430px;">
                  <img class="product-img" src="./assets/image/product/<?php echo $row_search['Img'];?>"/>
                  <div class="card-body">
                    <h5>
                      <?php echo $row_search['TenSanPham']; ?>
                    </h5>
                    <h6 class="text-danger"><s><?php echo number_format($row_search['GiaBan'],0,',','.')?> VND</s> <sup class="badge badge-danger"><?php echo -$row_search['GiamGia']?>%</sup></h6>
                    <h6><?php echo number_format($row_search['GiaBan'] *(100 - $row_search['GiamGia'])/ 100,0,',','.')?> VND</h6>
                    <?php if(isset($_SESSION['TenDangNhap'])) { 
                      ?>
                    <input type="submit" class="btn btn-info" name='submit' value="Mua">  
                    <?php } else{ ?>
                    <input type="submit" class="btn btn-info" name='submit' value="Xem chi tiết">
                    <?php 
                    } 
                    ?>
                  </div>        
                </div>
              </form>
              <?php
            }
          }
          ?>
      </div>
    </div>
	</div>
</div>