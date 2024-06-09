<div class="menu sticky-top">
    <nav class="navbar navbar-expand-lg primary-background">
        <div class="container-fluid font-weight-bold">
            <a class="navbar-branch" href="./index.php">
                <img class="logo" src="./assets/image/logo/logo.png" />
            </a>
            <button
                class="navbar-toggler"
                type="button"
                data-toggle="collapse"
                data-target="#collapsibleNavbar"
            >
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a
                            class="nav-link text-light"
                            href="./index.php"
                            >Trang chủ</a
                        >
                    </li>
                    <li class="nav-item">
                        <a
                            class="nav-link text-light"
                            href="./index.php?navigate=showProducts"
                            >Sản phẩm</a
                        >
                    </li>
                    <?php if(isset($_SESSION['TenDangNhap'])) { ?>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="./index.php?navigate=cart">Giỏ hàng</a>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown show">
                            <a
                                class="nav-link text-light dropdown-toggle"
                                role="button"
                                id="dropdownMenuLink"
                                data-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                                style="cursor: pointer;"
                            >
                                Tài khoản
                            </a>

                            <div
                                class="dropdown-menu"
                                aria-labelledby="dropdownMenuLink"
                            >
                                <a
                                    href="./index.php?navigate=profile"
                                    class="dropdown-item"
                                    >Tài khoản của tôi</a
                                >
                                <a
                                    class="dropdown-item"
                                    href="./index.php?navigate=orderHistory"
                                    >Lịch sử đặt hàng</a
                                >
                                <a
                                    class="dropdown-item"
                                    href="./pages/main/account/logout.php"
                                    >Đăng xuất</a
                                >
                            </div>
                        </div>
                    </li>

                    <?php } else {?>
                    <li class="nav-item">
                        <a
                            class="nav-link text-light"
                            href="./index.php?navigate=login"
                            >Đăng nhập</a
                        >
                    </li>
                    <li class="nav-item">
                        <a
                            class="nav-link text-light"
                            href="./index.php?navigate=signup"
                            >Đăng ký</a
                        >
                    </li>
                    
                    <?php }?>
                </ul>
            </div>
            <form
                action="index.php?navigate=timkiem"
                class="d-flex"
                role="search"
                method="POST"
            >
            <div class="input-group">
                    <input
                        type="search"
                        placeholder="Tên sản phẩm..."
                        class="form-control border-0 no-br-right"
                        name="tukhoa"
                    />
                    <div class="input-group-btn">
                        <input
                            type="submit"
                            class="btn bg-transparent border-light no-br-left text-light"
                            name="timkiem"
                            value="Tìm kiếm"
                        />
                    </div>
                </div>
            </form>
        </div>
    </nav>
</div>