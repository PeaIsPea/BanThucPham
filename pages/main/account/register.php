<?php
// nhận dữ liệu từ người dùng
if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $password_repeat = $_POST['password-repeat'];
  $email = $_POST['email'];
  $fullname = $_POST['fullname'];
  $address = $_POST['address'];
  $phonenumber = $_POST['phonenumber'];
  $NgayDangKi = date("Y-m-d H:i:s");
  $partten = "/^[A-Za-z0-9_.]{6,32}@([a-zA-Z0-9]{2,12})(.[a-zA-Z]{2,12})+$/";
  if (isset($_POST['submit']) && $_POST['username'] != "" && $_POST['password'] != "" && $_POST['password-repeat'] != "" && $_POST['email'] != "" && $_POST['fullname'] != "" && $_POST['address'] != "" && $_POST['phonenumber'] != "") {
    if ($password != $password_repeat) {
      $checkRegister = "Nhập lại mật khẩu không trùng khớp";
    } else if (!preg_match($partten, $email, $matchs))
      $checkRegister = "Email bạn vừa nhập không hợp lệ";
    else if (!preg_match("/^[0-9]{10,12}$/", $phonenumber))
      $checkRegister = "Số điện thoại không hợp lệ.";
    else {
      $sql_add = "INSERT INTO thanhvien(TenDangNhap,MatKhau,Email,HoVaTen,DiaChi,SoDienThoai,NgayDangKi)
      VALUES('" . $username . "','" . md5($password) . "','" . $email . "','" . $fullname . "','" . $address . "','" . $phonenumber . "','" . $NgayDangKi . "')";
      mysqli_query($mysqli, $sql_add);
      $id_thanhvien = mysqli_insert_id($mysqli);
      $sql_insert_giohang = "INSERT INTO giohang(ID_ThanhVien) VALUES (" . $id_thanhvien . ")";
      mysqli_query($mysqli, $sql_insert_giohang);
      $checkRegister = "Đăng kí thành công";
      header('location: index.php?navigate=login');
    }
  }
}
?>

<section>
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black mt-4 mb-4" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Đăng ký</p>
                <p class="text-center text-danger">
                  <?php if (isset($checkRegister)) {
                    echo $checkRegister;
                  } else {
                    echo " ";
                  }
                  ?>
                </p>
                <form class="mx-1 mx-md-4" action="" method="POST">
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fa fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" id="form3Example1c" class="form-control" required name="fullname" placeholder="Họ tên"/>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fa fa-home fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" class="form-control" required name="address" placeholder="Địa chỉ"/>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="email" class="form-control" required name="email" placeholder="Email"/>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fa fa-phone fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" class="form-control" required name="phonenumber" placeholder="Số điện thoại"/>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fa fa-user-circle fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" class="form-control" required name="username" placeholder="Tên đăng nhập"/>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" class="form-control" required name="password" placeholder="Mật khẩu"/>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" class="form-control" required name="password-repeat" placeholder="Nhập lại mật khẩu"/>
                    </div>
                  </div>

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" class="btn btn-primary" name="submit">Đăng ký</button>
                  </div>
                </form>
              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                <img src="./assets/image/banner/signup.png"
                  class="img-fluid" alt="Sample image">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>