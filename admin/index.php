<?php
session_start();
include("config/connection.php");
if (!isset($_SESSION['admin'])) {
    header('location: login.php');
}
?>

<!DOCTYPE html>
<html lang="vi">
    <head>
        <meta charset="UTF-8" />
        <link rel="icon" href="./assets/image/logo/logo.png">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link
            rel="stylesheet"
            href="../assets/bootstrap/css/bootstrap.min.css"
        />
        <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.css" />
        <link
            rel="stylesheet"
            href="../assets/bootstrap/js/bootstrap.bundle.js"
        />
        <link
            rel="stylesheet"
            href="../assets/bootstrap/js/bootstrap.bundle.min.js"
        />
        <link
            rel="stylesheet"
            href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
            integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
            crossorigin="anonymous"
        />
        <link rel="stylesheet" href="css/style.css" />
        <title>Admin</title> <link rel="icon" href="./assets/image/logo/logo.png">
        
    </head>
    <body>
        <div id="warpper" class="nav-fixed">
            <nav class="topnav shadow navbar-light bg-white d-flex">
                <div class="navbar-brand"><a href="index.php">QUẢN LÝ</a></div>
                <div class="nav-right">
                    <div class="btn-group mr-auto">
                        <button
                            type="button"
                            class="btn dropdown"
                            data-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                        >
                            <i class="plus-icon fas fa-plus-circle"></i>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="?product=add-product"
                                >Thêm sản phẩm</a
                            >
                            <a class="dropdown-item" href="?ncc=add-ncc"
                                >Thêm nhà cung cấp</a
                            >
                        </div>
                    </div>
            <div>
            <a class="btn btn-danger mr-2" href="logout.php">Thoát</a>
            </div>
            </nav>
            <div id="page-body" class="d-flex">
                <div id="sidebar" class="bg-white">
                    <ul id="sidebar-menu">
                    <li class="nav-link">
                            <a href="index.php">
                                <div class="nav-link-icon d-inline-flex">
                                    <i class="fas fa-chart-bar"></i>
                                </div>
                                Thống kê
                            </a>
                        </li>
                        <li class="nav-link">
                            <a href="?ncc=list-ncc">
                                <div class="nav-link-icon d-inline-flex">
                                    <i class="far fa-folder"></i>
                                </div>
                                Nhà cung cấp
                            </a>
                            <i class="arrow fas fa-angle-right"></i>
                            <ul class="sub-menu">
                                <li><a href="?ncc=add-ncc">Thêm mới</a></li>
                                <li>
                                    <a href="?ncc=list-ncc">Danh sách</a>
                                </li>
                            </ul>
                        </li>


                        

                        <li class="nav-link">
                            <a href="?product=list-product">
                                <div class="nav-link-icon d-inline-flex">
                                    <i class="far fa-folder"></i>
                                </div>
                                Sản phẩm
                            </a>
                            <i class="arrow fas fa-angle-right"></i>
                            <ul class="sub-menu">
                                <li>
                                    <a href="?product=add-product">Thêm mới</a>
                                </li>
                                <li>
                                    <a href="?product=list-product">Danh sách</a>
                                </li>
                                <li><a href="?cat=cat-product">Danh mục</a></li>
                            </ul>
                        </li>
                        <li class="nav-link">
                            <a href="index.php?order=order-list">
                                <div class="nav-link-icon d-inline-flex">
                                    <i class="far fa-folder"></i>
                                </div>
                                Đơn hàng
                            </a>
                            <i class="arrow fas fa-angle-right"></i>
                            <ul class="sub-menu">
                                <li><a href="?order=success-order-list">Đơn hàng đã duyệt</a></li>
                                <li><a href="?order=canceled-order-list">Đơn hàng đã hủy</a></li>
                            </ul>
                        </li>
                        <li class="nav-link">
                            <a href="?user=list-user">
                                <div class="nav-link-icon d-inline-flex">
                                    <i class="far fa-folder"></i>
                                </div>
                                Tài khoản
                            </a>
                            <i class="arrow fas fa-angle-right"></i>
                            <ul class="sub-menu">
                                <li>
                                    <a href="?user=list-user"
                                        >Danh sách</a
                                    >
                                </li>
                                <li>
                                    <a href="?user=comments"
                                        >Bình luận</a
                                    >
                                </li>
                            </ul>
                        </li>


                        </li>
                       
                    </ul>
                </div>
                <div id="wp-content">
                <?php
                if(isset($_GET['user'])){
                    $user = $_GET['user'];
                    include "modules/manage_users/{$user}.php";
                }
                else if(isset($_GET['product'])){
                    $product = $_GET['product'];
                    include "modules/manage_products/{$product}.php";
                } 
                else if(isset($_GET['cat'])){
                    $cat = $_GET['cat'];
                    require "modules/manage_categories/{$cat}.php";
                }
                else if(isset($_GET['ncc'])){
                    $ncc = $_GET['ncc'];
                    require "modules/manage_suppliers/{$ncc}.php";
                }
                else if(isset($_GET['order'])){
                    $order = $_GET['order'];
                    require "modules/manage_orders/{$order}.php";
                }
                else if(isset($_GET['sta'])){
                    $sta = $_GET['sta'];
                    require "modules/statistical_tables/{$sta}.php";
                }
                else {
                    require "modules/dashboard.php";
                }
                ?>
                </div>
            </div>
        </div>
    </body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"
    ></script>
    <script
        src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"
    ></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <script src="js/app.js"></script>
    <script src="js/thongke.js"></script>
</html>
