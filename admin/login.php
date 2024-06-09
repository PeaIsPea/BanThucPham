<?php
  include("./config/connection.php");
  session_start();

  if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $sql_getName = "SELECT * FROM quanly WHERE TenDangNhap = '$username' LIMIT 1";
    $query_getName = mysqli_query($mysqli, $sql_getName);
    $row_getName = mysqli_fetch_array($query_getName);
    if ($username == '' || $password == '') {
      $checkLogin = 'Vui lòng nhập đầy đủ thông tin!';
    } else {
      $sql_login = mysqli_query($mysqli, "SELECT * FROM quanly WHERE 
        TenDangNhap = '$username' AND MatKhau = '$password' LIMIT 1");
      $count = mysqli_num_rows($sql_login);
      if ($count > 0) {
        $_SESSION['admin'] = $username;
        header("location:index.php");
      } else {
        $checkLogin = 'Tài khoản hoặc mật khẩu không chính xác!';
      }
    }
  }
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset=utf-8>
  <title>Login Admin</title>
  <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="../assets/bootstrap/js/bootstrap.bundle.js">
  <link rel="stylesheet" href="../assets/bootstrap/js/bootstrap.bundle.min.js">
  <link rel="stylesheet" href="./css/style.css">
</head>

<body>
  <div id="login" class="container">
    <div id="login-row" class="row justify-content-center align-items-center">
      <div id="login-column" class="col-md-6">
        <div id="login-box" class="col-md-12">
          <h2 class="text-center text-info mt-5">Đăng nhập tài khoản Admin</h2>
          <p class="text-center text-danger font-weight-bold">
            <?php if (isset($checkLogin)) {
              echo $checkLogin;
            } else {
              echo " ";
            }
            ?>
          </p>
          <form method="POST" action="">
              <div class="form-group">
                <td class="text-info">Tên đăng nhập:</td><br>
                <td><input class="form-control" type="text" name="username"></td>
              </div>
              <div class="form-group">
                <td class="text-info">Mật khẩu:</td><br>
                <td> <input class="form-control" type="password" name="password"></td>
              </div>
              <div class="text-center"> 
                <input type="submit" 
                class="btn btn-info" name="login" value="ĐĂNG NHẬP">
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  </div>
</body>
</html>