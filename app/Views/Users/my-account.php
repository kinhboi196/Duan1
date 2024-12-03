<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">


<!-- Mirrored from themesflat.co/html/ecomus/my-account.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 06 Nov 2024 14:45:11 GMT -->

<head>
    <meta charset="utf-8">
    <title>Gizom Home - Tài khoản</title>

    <meta name="author" content="themesflat.com">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- font -->
    <link rel="stylesheet" href="assets/Users/fonts/fonts.css">
    <!-- Icons -->
    <link rel="stylesheet" href="assets/Users/fonts/font-icons.css">
    <link rel="stylesheet" href="assets/Users/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/Users/css/swiper-bundle.min.css">
    <link rel="stylesheet" href="assets/Users/css/animate.css">
    <link rel="stylesheet" type="text/css" href="assets/Users/css/styles.css" />

    <!-- Favicon and Touch Icons  -->
    <link rel="shortcut icon" href="assets/Users/images/logo/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="assets/Users/images/logo/favicon.png">

</head>

<body class="preload-wrapper">
    <!-- RTL -->
    <!-- /RTL  -->
    <div id="wrapper">
        <!-- header -->
        <?php include 'app/Views/Users/layouts/header.php'?>
        <!-- /header -->

        <!-- page-title -->
        <div class="tf-page-title">
            <div class="container-full">
                <div class="heading text-center">My Account</div>
            </div>
        </div>
        <!-- /page-title -->

        <!-- page-cart -->
        <section class="flat-spacing-11">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <!-- sidebar -->
                        <?php include 'app/Views/Users/layouts/my-account-sidebar.php'?>
                         <!-- /sidebar -->
                    </div>
                    <div class="col-lg-9">
                        <div class="my-account-content account-dashboard">
                            <div class="mb_60">
                                <h5 class="fw-5 mb_20">Xin chào: <?= $user->name ?></h5>
                                <p><img src="<?= $user->image ?>" alt="" width="200px"></p>
                                <p>
                                    Ở trang tổng quan bạn có thể xem <a class="text_primary"
                                        href="my-account-orders.html">Lịch sử đặt hàng</a>,
                                         Quản lý <a class="text_primary" href="my-account-address.html">Địa chỉ giao hàng/phương thức thanh toán</a>,
                                          và <a class="text_primary" href="<?=BASE_URL?>?act=account-detail">Chỉnh sửa thông tin tài khoản</a>.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- page-cart -->

        <div class="btn-sidebar-account">
            <button data-bs-toggle="offcanvas" data-bs-target="#mbAccount" aria-controls="offcanvas"><i
                    class="icon icon-sidebar-2"></i></button>
        </div>

        <!-- footer -->
        <?php include 'app/Views/Users/layouts/footer.php'?>
        <!-- /footer -->

    </div>



    <!-- Javascript -->
    <script type="text/javascript" src="assets/Users/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/Users/js/jquery.min.js"></script>
    <script type="text/javascript" src="assets/Users/js/swiper-bundle.min.js"></script>
    <script type="text/javascript" src="assets/Users/js/carousel.js"></script>

    <script type="text/javascript" src="assets/Users/js/bootstrap-select.min.js"></script>
    <script type="text/javascript" src="assets/Users/js/lazysize.min.js"></script>
    <script type="text/javascript" src="assets/Users/js/count-down.js"></script>
    <script type="text/javascript" src="assets/Users/js/wow.min.js"></script>
    <script type="text/javascript" src="assets/Users/js/wow.min.js"></script>
    <script type="text/javascript" src="assets/Users/js/multiple-modal.js"></script>
    <script type="text/javascript" src="assets/Users/js/main.js"></script>
</body>


<!-- Mirrored from themesflat.co/html/ecomus/my-account.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 06 Nov 2024 14:45:11 GMT -->

</html>