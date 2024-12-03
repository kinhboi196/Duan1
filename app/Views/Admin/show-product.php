<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<!--<![endif]-->


<!-- Mirrored from themesflat.co/html/ecomus/admin-ecomus/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 06 Nov 2024 14:58:29 GMT -->

<head>
    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <title>Ecomus - Ultimate Admin Dashboard HTML</title>

    <meta name="author" content="themesflat.com">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Theme Style -->
    <link rel="stylesheet" type="text/css" href="assets/Admin/css/animate.min.css">
    <link rel="stylesheet" type="text/css" href="assets/Admin/css/animation.css">
    <link rel="stylesheet" type="text/css" href="assets/Admin/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="assets/Admin/css/bootstrap-select.min.css">
    <link rel="stylesheet" type="text/css" href="assets/Admin/css/styles.css">



    <!-- Font -->
    <link rel="stylesheet" href="assets/Admin/font/fonts.css">

    <!-- Icon -->
    <link rel="stylesheet" href="assets/Admin/icon/style.css">

    <!-- Favicon and Touch Icons  -->
    <link rel="shortcut icon" href="images/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="images/favicon.png">

</head>

<body>

    <!-- #wrapper -->
    <div id="wrapper">
        <!-- #page -->
        <div id="page" class="">
            <!-- layout-wrap -->
            <div class="layout-wrap">
                <!-- preload -->
                <div id="preload" class="preload-container">
                    <div class="preloading">
                        <span></span>
                    </div>
                </div>
                <!-- /preload -->
                <!-- section-menu-left -->
                <?php include 'app/Views/Admin/layouts/sidebar.php' ?>
                <!-- /section-menu-left -->
                <!-- section-content-right -->
                <div class="section-content-right">
                    <!-- header-dashboard -->
                    <div class="header-dashboard">
                        <?php include 'app/Views/Admin/layouts/header.php' ?>
                    </div>
                    <!-- /header-dashboard -->
                    <!-- main-content -->
                    <div class="main-content">
                        <!-- main-content-wrap -->
                        <div class="main-content-inner">
                            <!-- main-content-wrap -->
                            <div class="main-content-wrap">
                                <div class="wg-box">
                                    <div class="title-box">
                                        Chỉnh sửa Product
                                    </div>
                                    <form action="#">
                                        <div class="mb-3">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?=$product->name?>" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label for="category_id">Category_id</label>
                                            <input type="text" class="form-control" name="category_id" id="category_id" placeholder="Category_id" value="<?=$product->category_id?>" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label for="description">Description</label>
                                            <input type="text" class="form-control" name="description" id="description" placeholder="Description" value="<?=$product->description?>" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label for="price">Price</label>
                                            <input type="text" class="form-control" name="price" id="price" placeholder="Price" value="<?=$product->price?>" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label for="price_sale">Price_sale</label>
                                            <input type="text" class="form-control" name="price_sale" id="price_sale" placeholder="Price_sale" value="<?=$product->price_sale?>" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label for="stock">Stock</label>
                                            <input type="text" class="form-control" name="stock" id="stock" placeholder="Stock" value="<?=$product->stock?>" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label for="image_main">Image_main</label>
                                            <img src="<?=$product->image_main?>" width="100px" alt="" readonly>
                                        </div>
                                    </form>
                                </div>
                                <a href="<?=BASE_URL?>?role=admin&act=all-product">
                                <button class="btn btn-danger">Quay lại danh sách</button>
                                </a>
                            </div>
                            <!-- /main-content-wrap -->
                        </div>
                        <!-- /main-content-wrap -->
                        <!-- bottom-page -->
                        <?php include 'app/Views/Admin/layouts/footer.php' ?>
                        <!-- /bottom-page -->
                    </div>
                    <!-- /main-content -->
                </div>
                <!-- /section-content-right -->
            </div>
            <!-- /layout-wrap -->
        </div>
        <!-- /#page -->
    </div>
    <!-- /#wrapper -->

    <!-- Javascript -->
    <script src="assets/Admin/js/jquery.min.js"></script>
    <script src="assets/Admin/js/bootstrap.min.js"></script>
    <script src="assets/Admin/js/bootstrap-select.min.js"></script>
    <script src="assets/Admin/js/zoom.js"></script>
    <script src="assets/Admin/js/morris.min.js"></script>
    <script src="assets/Admin/js/raphael.min.js"></script>
    <script src="assets/Admin/js/morris.js"></script>
    <script src="assets/Admin/js/jvectormap.min.js"></script>
    <script src="assets/Admin/js/jvectormap-us-lcc.js"></script>
    <script src="assets/Admin/js/jvectormap-data.js"></script>
    <script src="assets/Admin/js/jvectormap.js"></script>
    <script src="assets/Admin/js/apexcharts/apexcharts.js"></script>
    <script src="assets/Admin/js/apexcharts/line-chart-1.js"></script>
    <script src="assets/Admin/js/apexcharts/line-chart-2.js"></script>
    <script src="assets/Admin/js/apexcharts/line-chart-3.js"></script>
    <script src="assets/Admin/js/apexcharts/line-chart-4.js"></script>
    <script src="assets/Admin/js/apexcharts/line-chart-5.js"></script>
    <script src="assets/Admin/js/apexcharts/line-chart-6.js"></script>
    <script src="assets/Admin/js/apexcharts/line-chart-7.js"></script>
    <script src="assets/Admin/js/switcher.js"></script>
    <script defer src="assets/Admin/js/theme-settings.js"></script>
    <script src="assets/Admin/js/main.js"></script>

</body>


<!-- Mirrored from themesflat.co/html/ecomus/admin-ecomus/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 06 Nov 2024 14:58:54 GMT -->

</html>