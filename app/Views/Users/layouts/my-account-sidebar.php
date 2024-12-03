<div class="wrap-sidebar-account">
    <ul class="my-account-nav">
        <li>
            <a href="<?= BASE_URL ?>?act=my-account" class="my-account-nav-item
            <?= $_GET['act'] == 'my-account' ? 'active' : '' ?>
            ">
                Dashboard
            </a>
        </li>
        <li><a href="my-account-orders.html" class="my-account-nav-item">Lịch sử đặt hàng</a></li>
        <li><a href="my-account-address.html" class="my-account-nav-item">Address</a></li>
        <li>
            <a href="<?= BASE_URL ?>?act=account-detail" class="my-account-nav-item
            <?= $_GET['act'] == 'account-detail' ? 'active' : '' ?>">
                Thông tin tài khoản
            </a>
        </li>
        <li><a href="my-account-wishlist.html" class="my-account-nav-item">Wishlist</a></li>
        <li><a href="<?php BASE_URL ?>?act=logout" class="my-account-nav-item">Logout</a></li>
    </ul>
</div>