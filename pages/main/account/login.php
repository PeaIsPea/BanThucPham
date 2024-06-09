<?php
if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = md5($_POST['password']);
  $sql_login = "SELECT * FROM thanhvien WHERE 
  TenDangNhap = '$username' AND MatKhau = '$password' LIMIT 1";
  $query_login = mysqli_query($mysqli, $sql_login);
  $count = mysqli_num_rows($query_login);
  $row = mysqli_fetch_array($query_login);
  if ($count > 0) {
    $id_cus = $row['ID_ThanhVien'];
    $sql_cart = "SELECT * FROM giohang where ID_ThanhVien = $id_cus";
    $query_cart = mysqli_query($mysqli, $sql_cart);
    $row_cart = mysqli_fetch_array($query_cart);
    $_SESSION['TenDangNhap'] = $username;
    $_SESSION['HoVaTen'] = $row['HoVaTen'];
    $_SESSION['ID_ThanhVien'] = $id_cus;
    $_SESSION['Email'] = $row['Email'];
	  $_SESSION['ID_GioHang'] = $row_cart['ID_GioHang'];
    header("location: ./index.php");
  } else {
    $checkLogin = 'Tên đăng nhập hoặc mật khẩu không chính xác!';
  }
  }
?>

<section class="vh-100">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="./assets/image/banner/login.png"
          class="img-fluid" alt="Sample image">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
        <form method="POST" action="">
          <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start  mt-5">
            <p class="lead font-weight-normal mb-0 me-3">Đăng nhập với </p>
            <button type="button" class="btn btn-primary rounded-circle mx-1">
              <i class="fab fa-facebook-f"></i>
            </button>

            <button type="button" class="btn btn-primary rounded-circle mx-1">
              <i class="fab fa-twitter"></i>
            </button>

            <button type="button" class="btn btn-primary rounded-circle mx-1">
              <i class="fab fa-linkedin-in"></i>
            </button>
          </div>

          <div class="divider d-flex align-items-center my-4">
            <p class="text-center font-weight-bold mx-3 mb-0">Or</p>
          </div>

          <div class="form-outline mb-4">
            <label for="username">Tên đăng nhập:</label>
            <input required type="text" id="username" class="form-control form-control-lg" 
              name="username" placeholder="Enter username" />
          </div>
          
          <div class="form-outline mb-3">
            <label for="password">Mật khẩu:</label>
            <input required type="password" id="password" class="form-control form-control-lg"
              name="password" placeholder="Enter password" />
          </div>

          <p class="text-center font-weight-bold mt-1 mb-1 text-danger">
            <?php if (isset($checkLogin)) {
                echo $checkLogin;
              } else {
                echo " ";
              }
            ?>
          </p>

          <div class="d-flex justify-content-between align-items-center">
            <a href="#!" class="text-body">Quên mật khẩu?</a>
          </div>

          <div class="text-center text-lg-start mt-4 pt-2">
            <input type="submit" class="btn btn-primary btn-lg" name="login"
              style="padding-left: 2.5rem; padding-right: 2.5rem;" value="Đăng nhập">
              <p class="small font-weight-bold mt-2 pt-1 mb-0">Chưa có tài khoản?
              <a href="index.php?navigate=signup" class="text-danger">Đăng ký</a>
            </p>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>