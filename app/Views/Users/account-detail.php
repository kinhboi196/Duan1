<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">


<!-- Mirrored from themesflat.co/html/ecomus/my-account-edit.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 06 Nov 2024 14:45:11 GMT -->

<head>
    <meta charset="utf-8">
    <title>Gizom Home - Thông tin tài khoản</title>

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
        <?php include 'app/Views/Users/layouts/header.php' ?>
        <!-- /header -->

        <!-- page-title -->
        <div class="tf-page-title">
            <div class="container-full">
                <div class="heading text-center">Account Details</div>
            </div>
        </div>
        <!-- /page-title -->

        <!-- page-cart -->
        <section class="flat-spacing-11">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <!-- sidebar -->
                        <?php include 'app/Views/Users/layouts/my-account-sidebar.php' ?>
                        <!-- /sidebar -->
                    </div>
                    <div class="col-lg-9">
                        <div class="my-account-content account-edit">
                            <div class="">
                                <?php
                                if (isset($_SESSION['message'])) {
                                    echo "<p style='color: green'>" . $_SESSION['message'] . "</p>";
                                    unset($_SESSION['message']);
                                }
                                ?>
                                <?php
                                if (isset($_SESSION['errorPassword'])) {
                                    echo "<p style='color: red'>" . $_SESSION['errorPassword'] . "</p>";
                                    unset($_SESSION['errorPassword']);
                                }
                                ?>
                                <?php
                                if (isset($_SESSION['passwordSuccess'])) {
                                    echo "<p style='color: green'>" . $_SESSION['passwordSuccess'] . "</p>";
                                    unset($_SESSION['passwordSuccess']);
                                }
                                ?>
                                <form class="" id="form-password-change" action="<?= BASE_URL ?>?act=account-update"
                                    method="post" enctype="multipart/form-data">
                                    <div class="tf-field style-1 mb_15">
                                        <input class="tf-field-input tf-input" placeholder=" " type="text"
                                            id="property2" name="name" value="<?= $user->name ?>">
                                        <label class="tf-field-label fw-4 text_black-2" for="property2">Họ và
                                            Tên</label>
                                    </div>
                                    <div class="tf-field style-1 mb_15">
                                        <input class="tf-field-input tf-input" placeholder=" " type="text"
                                            id="property3" name="email" value="<?= $user->email ?>">
                                        <label class="tf-field-label fw-4 text_black-2" for="property3">Email</label>
                                    </div>
                                    <div class="tf-field style-1 mb_15">
                                        <input class="tf-field-input tf-input" placeholder=" " type="text"
                                            id="property4" name="address" value="<?= $user->address ?>">
                                        <label class="tf-field-label fw-4 text_black-2" for="property4">Địa chỉ</label>
                                    </div>
                                    <div class="tf-field style-1 mb_15">
                                    <style>
                                        #property5::-webkit-inner-spin-button,
                                        #property5::-webkit-outer-spin-button {
                                            -webkit-appearance: none;
                                            margin: 0;
                                        }

                                        #property5 {
                                            -moz-appearance: textfield;
                                        }
                                    </style>
                                        <input class="tf-field-input tf-input" placeholder=" " type="number"
                                            id="property5" name="phone" value="<?= $user->phone ?>">
                                        <label class="tf-field-label fw-4 text_black-2" for="property5">Số điện
                                            thoại</label>
                                    </div>
                                    <div class="tf-field style-1 mb_15">
                                        <img src="<?= $user->image ?>" alt="" width="200px"><br>
                                        <label for="property6">Cập nhật hình ảnh</label><br>
                                        <input class="" type="file" accept="image/*" id="property6" name="image"
                                            value="<?= $user->image ?>">
                                    </div>
                                    <h6 class="mb_20">Password Change</h6>
                                    <div class="tf-field style-1 mb_30">
                                        <input class="tf-field-input tf-input" placeholder=" " type="password"
                                            id="property7" name="current-password">
                                        <label class="tf-field-label fw-4 text_black-2" for="property7">Mật khẩu hiện
                                            tại</label>
                                    </div>
                                    <div class="tf-field style-1 mb_30">
                                        <input class="tf-field-input tf-input" placeholder=" " type="password"
                                            id="property8" name="new-password">
                                        <label class="tf-field-label fw-4 text_black-2" for="property8">Mật khẩu
                                            mới</label>
                                    </div>
                                    <div class="tf-field style-1 mb_30">
                                        <input class="tf-field-input tf-input" placeholder=" " type="password"
                                            id="property9" name="confirm-password">
                                        <label class="tf-field-label fw-4 text_black-2" for="property9">Xác nhận mật
                                            khẩu mới</label>
                                    </div>
                                    <div class="mb_20">
                                        <button type="submit"
                                            class="tf-btn w-100 radius-3 btn-fill animate-hover-btn justify-content-center">Lưu
                                            thay đổi</button>
                                    </div>
                                </form>
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
        <?php include 'app/Views/Users/layouts/footer.php' ?>

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


<!-- Mirrored from themesflat.co/html/ecomus/my-account-edit.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 06 Nov 2024 14:45:11 GMT -->

</html>