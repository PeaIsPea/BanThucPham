<?php
$ID_ThanhVien = $_SESSION['ID_ThanhVien'];
$sql_Cus = "SELECT * FROM thanhvien WHERE ID_ThanhVien = $ID_ThanhVien";
$query_Cus = mysqli_query($mysqli, $sql_Cus);
$row = mysqli_fetch_array($query_Cus);
$HoVaTen = $row['HoVaTen'];
$Email = $row['Email'];
$SoDienThoai = $row['SoDienThoai'];
$DiaChi = $row['DiaChi'];
?>
    <div class="container mt-60">
      <div class="card bg-light">
        <article class="card-body mx-auto">
          <h4 class="card-title mt-3 text-center">Sửa thông tin cá nhân</h4>
          <form action="pages/main/account/change.php?id=<?= $ID_ThanhVien?>" method="POST">
            <div class="form-group input-group">
              <span class="input-group-text"> <i class="fa fa-user"></i> </span>
              <input required name="HoVaTen" class="form-control" value="<?php echo $HoVaTen ?>">
            </div>
            <div class="form-group input-group">
              <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
              <input required name="Email" class="form-control" value="<?php echo  $Email?>">
            </div>
            <div class="form-group input-group">
              <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
              <input required name="SoDienThoai" class="form-control" value="<?php echo $SoDienThoai ?>">
            </div>
            <div class="form-group input-group">
              <span class="input-group-text"> <i class="fa fa-building"></i> </span>
              <input required name="DiaChi" class="form-control" type="text" value="<?php echo  $DiaChi?>">
            </div>
            </br>
            <div class="form-group">
              <input type="submit" class="btn btn-primary btn-block" name="sua" value="Sửa">
            </div>
          </form>
        </article>
      </div>
    </div>