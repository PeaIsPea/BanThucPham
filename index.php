<!DOCTYPE html>
<html>
<head>
  <meta charset=utf-8>
  <link rel="icon" href="./assets/image/logo/logo.png">
  <title>Thực phẩm tươi Ranne</title>
  <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="./assets/bootstrap/js/bootstrap.bundle.js">
  <link rel="stylesheet" href="./assets/bootstrap/js/bootstrap.bundle.min.js">
  <link
            rel="stylesheet"
            href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
            integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
            crossorigin="anonymous"
        />
  <link rel="stylesheet" href="./assets/css/style.css">
  <link rel="stylesheet" href="./assets/css/responsive.css">
</head>
<body>
  <?php 
    include("./admin/config/connection.php");
    session_start();
  ?>
  <?php include("./pages/menu.php") ?>
  <?php include("./pages/main.php") ?>
  <?php include("./pages/footer.php") ?>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</html>