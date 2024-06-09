<div>
  <?php
    if(isset($_GET['navigate'])){
      $temp = $_GET['navigate'];
    } else {
      $temp = '';
    }
    
    if($temp == "login") {
      include("main/account/login.php");
    } else if($temp == "signup") {
      include("main/account/register.php");
    } else if($temp == "showProducts") {
      include("main/product/showProducts.php");
    } else if($temp == "timkiem") {
      include("main/product/searchResults.php");
    } else if($temp == "profile") {
      include("main/account/profile.php");
    } else if($temp == "changePassword") {
      include("main/account/changePassword.php");
    } else if($temp == "changeProfile") {
      include("main/account/changeProfile.php");
    } else if($temp == "category") {
      include("main/product/category.php");
    } else if($temp == "productInfo") {
      include("main/product/productInfo.php");
    } else if($temp == "thanhtoan") {
      include("main/order/thanhtoan.php");
    } else if($temp == "cart") {
      include("main/cart/cart.php");
    } else if($temp == "customer_info") {
      include("main/order/customer_info.php");
    } else if($temp == "confirm_order") {
      include("main/order/confirm_order.php");
    } else if($temp == "orderHistory") {
      include("main/order/orderHistory.php");
    } else if($temp == "thanhtoannganhang") {
      include("main/order/thanhtoannganhang.php");
    } else if($temp == "order_detail") {
      include("main/order/order_detail.php");
    } else if($temp == "finish") {
      include("main/order/finish.php");
    } else {
      include("main/home.php");
    }
  ?>
</div>
