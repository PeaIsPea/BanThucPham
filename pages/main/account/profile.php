<?php
$ID_ThanhVien = $_SESSION['ID_ThanhVien'];
$sql_Cus = "SELECT * FROM thanhvien WHERE ID_ThanhVien = $ID_ThanhVien";
$query_Cus = mysqli_query($mysqli, $sql_Cus);
$row = mysqli_fetch_array($query_Cus);
?>
    <div class="container">
      <div class="card bg-light mt-5">
        <article class="card-body mx-auto" style="width: 400px;">
          <h4 class="card-title mt-3 text-center">Thông tin cá nhân</h4>
          <form action="" method="POST" >
            <div class="form-group input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-user-circle"></i> </span>
              </div>
              <input readonly name="HoVaTen" class="form-control" value="<?php echo $row['HoVaTen'] ?>">
            </div>
            <div class="form-group input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
              </div>
              <input readonly name="Email" class="form-control" value="<?php echo $row['Email'] ?>">
            </div>
            <div class="form-group input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
              </div>
              <input readonly name="" class="form-control" value="<?php echo $row['SoDienThoai'] ?>">
            </div>
            <div class="form-group input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa fa-home"></i> </span>
              </div>
              <input readonly name="" class="form-control"  type="text" value="<?php echo $row['DiaChi'] ?>">
            </div>
            </br>
            <p class="text-center">
              <a class="btn btn-outline-primary" href="index.php?navigate=changePassword">Đổi mật khẩu</a>
            </p>
            <p class="text-center">
              <a class="btn btn-outline-primary" href="index.php?navigate=changeProfile">Sửa thông tin</a> </p>
            </a>
          </form>
        </article>
      </div>
    </div>