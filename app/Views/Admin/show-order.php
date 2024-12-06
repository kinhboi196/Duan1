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
    <link rel="stylesheet" type="text/css" h..00ref="assets/Admin/css/animate.min.css">
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
                    <style>
                        /* Nút Chi Tiết Đơn nhỏ */
                        .btn-detail {
                            padding: 5px 10px;
                            /* Giảm padding để nút nhỏ hơn */
                            background-color: #28a745;
                            color: white;
                            font-size: 12px;
                            /* Giảm kích thước font */
                            font-weight: 600;
                            text-align: center;
                            border: none;
                            border-radius: 5px;
                            display: inline-block;
                            transition: background-color 0.3s ease, transform 0.2s ease;
                        }

                        /* Hiệu ứng hover */
                        .btn-detail:hover {
                            background-color: #218838;
                            transform: scale(1.05);
                            text-decoration: none;
                        }

                        /* Hiệu ứng khi nút được nhấn */
                        .btn-detail:active {
                            transform: scale(0.98);
                        }
                    </style>
                    <div class="main-content">
                        <!-- main-content-wrap -->
                        <div class="main-content-inner">
                            <!-- main-content-wrap -->
                            <div class="main-content-wrap">
                                <div class="wg-box">
                                    <div class="title-box">
                                        Danh sách đơn hàng
                                    </div>
                                    <div class="title-box">
                                        <div class="wg-table table-product-list">
                                            <ul class="table-title flex mb-14">
                                                <li>
                                                    <div class="body-title">STT</div>
                                                </li>
                                                <li>
                                                    <div class="body-title">Name</div>
                                                </li>
                                                <li>
                                                    <div class="body-title">Phone</div>
                                                </li>
                                                <li>
                                                    <div class="body-title">Address</div>
                                                </li>
                                                <li>
                                                    <div class="body-title">Total</div>
                                                </li>
                                                <li>
                                                    <div class="body-title">Status</div>
                                                </li>
                                                <li>
                                                    <div class="body-title">Action</div>
                                                </li>
                                            </ul>
                                            <ul class="flex flex-column">
                                                <?php foreach ($orders as $key => $value): ?>
                                                    <li class="wg-product item-row flex">
                                                        <div class="body-text text-main-dark mt-4"><?= $key + 1 ?></div>
                                                        <div class="body-text text-main-dark mt-4"><?= $value->name ?></div>
                                                        <div class="body-text text-main-dark mt-4"><?= $value->phone ?></div>
                                                        <div class="body-text text-main-dark mt-4"><?= $value->address ?></div>
                                                        <div class="body-text text-main-dark mt-4"><?= number_format($value->total) ?> VNĐ</div>
                                                        <div class="body-text text-main-dark mt-4">
                                                            <form action="<?= BASE_URL ?>?role=admin&act=order-change-status" method="post">
                                                                <input type="hidden" name="order_id" value="<?= $value->id ?>">
                                                            <select name="status" class="status-select">
                                                                <option
                                                                    <?php if ($value->status == "pending"): ?>
                                                                    selected
                                                                    <?php endif; ?>
                                                                    value="pending">Chờ xử lí
                                                                </option>
                                                                <option
                                                                    <?php if ($value->status == "completed"): ?>
                                                                    selected
                                                                    <?php endif; ?>
                                                                    value="completed">Đã hoàn thành
                                                                </option>
                                                                <option
                                                                    <?php if ($value->status == "processing"): ?>
                                                                    selected
                                                                    <?php endif; ?>
                                                                    value="processing">Đang xử lý
                                                                </option>
                                                                <option
                                                                    <?php if ($value->status == "refunded"): ?>
                                                                    selected
                                                                    <?php endif; ?>
                                                                    value="refunded">Hoàn tiền
                                                                </option>
                                                                <option
                                                                    <?php if ($value->status == "shipped"): ?>
                                                                    selected
                                                                    <?php endif; ?>
                                                                    value="shipped">đã giao hàng
                                                                </option>
                                                                <option
                                                                    <?php if ($value->status == "returned"): ?>
                                                                    selected
                                                                    <?php endif; ?>
                                                                    value="returned">đã trả hàng
                                                                </option>
                                                                <option
                                                                    <?php if ($value->status == "canceled"): ?>
                                                                    selected
                                                                    <?php endif; ?>
                                                                    value="canceled">Đã hủy
                                                                </option>
                                                            </select>
                                                            </form>
                                                        </div>
                                                        <div class="body-text text-main-dark mt-4">
                                                            <div class="list-icon-function">
                                                                <div class="item view">
                                                                    <td class="text-end">
                                                                        <a href="<?= BASE_URL ?>?role=admin&act=show-order-detail&order_id=<?= $value->id ?>" class="btn btn-detail">Chi Tiết Đơn</a>
                                                                    </td>

                                                                </div>
                                                                <!-- <?php if ($value->status == 'pending'): ?>
                                                                    <div class="item cancel">
                                                                        <a href="<?= BASE_URL ?>?role=admin&act=cancel-order&order_id=<?= $value->id ?>" onclick="return confirm('Bạn có muốn hủy đơn?')">
                                                                            <i class="icon-trash-2"></i>
                                                                            <span>Hủy Đơn</span>
                                                                        </a>
                                                                    </div>
                                                                <?php endif; ?> -->
                                                            </div>
                                                        </div>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                        <div class="divider"></div>
                                    </div>

                                </div>
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

    <script>
        $(".status-select").change(function(){
            $(this).parent().submit()
        })
    </script>
</body>


<!-- Mirrored from themesflat.co/html/ecomus/admin-ecomus/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 06 Nov 2024 14:58:54 GMT -->

</html>