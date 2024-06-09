<?php
  $sql_product = "SELECT *
  FROM sanpham
  WHERE ID_SanPham IN (
      SELECT ID_SanPham
      FROM chitietdonhang
      inner join donhang
      on chitietdonhang.ID_DonHang = donhang.ID_DonHang
      where donhang.XuLy = 1
      GROUP BY ID_SanPham
      ORDER BY SUM(SoLuong) DESC
  ) LIMIT 8";
  $query_product = mysqli_query($mysqli, $sql_product);
  $sql_supplier = "SELECT * FROM nhacungcap LIMIT 3";
  $query_supplier = mysqli_query($mysqli, $sql_supplier);
?>

<div>
    <!-- Slides -->
    <div id="slides" class="carousel slide" data-ride="carousel">
          <ul class="carousel-indicators">
            <li data-target="#slides" data-slide-to="0" class="active"></li>
            <li data-target="#slides" data-slide-to="1"></li>
            <li data-target="#slides" data-slide-to="2"></li>
          </ul>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="intro-slide" src="./assets/image/banner/banner1.jpg" alt="banner">
              <div class="carousel-caption d-none d-md-block" style="text-shadow: 2px 2px 2px #000;">
                <p class="font-italic font-weight-bold">"An toàn và đầy hấp dẫn, rau sạch của chúng tôi luôn đảm bảo sự tươi mát!"</p>
              </div>
            </div>
            <div class="carousel-item">
              <img class="intro-slide" src="./assets/image/banner/banner2.jpg" alt="banner">
              <div class="carousel-caption d-none d-md-block" style="text-shadow: 2px 2px 2px #000;">
                <p class="font-italic font-weight-bold">"Thịt tươi sạch đem lại trải nghiệm tuyệt hảo!"</p>
              </div>
            </div>
            <div class="carousel-item">
              <img class="intro-slide" src="./assets/image/banner/banner3.jpg" alt="banner">
              <div class="carousel-caption d-none d-md-block" style="text-shadow: 2px 2px 2px #000;">
                <p class="font-italic font-weight-bold">"Củ quả tươi sống của chúng tôi luôn đảm bảo nguồn dinh dưỡng tuyệt vời nhất!"</p>
              </div>
            </div>
          </div>
        </div>
         
        <!-- Featured products -->
        <div class="container mt-60">
            <h2 class="text-danger text-center">Sản phẩm nổi bật</h2>
            <p class=" text-center">
                <i>Những sản phẩm được khách hàng ưu thích nhất</i>
            </p>
            <div class="row mt-60">
            <?php
            while ($row_product = mysqli_fetch_array($query_product)) {
            ?>
                <form class="col-lg-3 col-md-4 col-sm-6" action="index.php?navigate=productInfo&id_product=<?php echo $row_product['ID_SanPham']; ?>" method="POST">
                    <div class="card text-center mb-4" style="height: 430px;">
                      <img src="./assets/image/product/<?php echo $row_product['Img']; ?>" class="card-img-top product-img">
                      <div class="card-body">
                        <h5>
                          <?php echo $row_product['TenSanPham']; ?>
                        </h5>
                        <h6 class="text-danger"><s><?php echo number_format($row_product['GiaBan'],0,',','.')?> VND</s> <sup class="badge badge-danger"><?php echo -$row_product['GiamGia']?>%</sup></h6>
                        <h6><?php echo number_format($row_product['GiaBan'] *(100 - $row_product['GiamGia'])/ 100,0,',','.')?> VND</h6>
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
            ?>
            </div>     
        </div>
              
    <!-- Suppliers -->
    <section class="supplier mt-60">
    <div class="container text-center">
        <h2 class="text-dark">Nguồn cung cấp thực phẩm</h2>
        <p class="text-dark">
            <i
                >Chúng tôi cam kết mang đến những thực phẩm có chất lượng đảm
                bảo và nguồn gốc rõ ràng</i
            >
        </p>
    </div>
    <div class="supplier row">
        <?php while($row_supplier = mysqli_fetch_array($query_supplier)){ ?>
        <div class="col-md-4 col-12 text-center">
            <div class="card mr-2 d-inline-block shadow-lg">
                <div class="card-img-top">
                    <img
                        src="./assets/image/supplier/<?= $row_supplier['Img']?>"
                        class="img-fluid rounded-circle p-4"
                        alt=""
                    />
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?= $row_supplier['TenNCC']?></h5>
                    <p class="card-text text-justify" style="height: 270px">
                        <?= $row_supplier['MoTa']?>
                    </p>
                    <a href="#" class="text-dark text-decoration-none"
                        >SĐT: <?= $row_supplier['SoDienThoai']?></a
                    >
                    <p class="text-black-50">Email: <?= $row_supplier['Email']?></p>
                </div>
            </div>
        </div>
        <?php }?>       
    </div>


    

    </section>
</div>