<?php
class DashboardController
{
    public function dashboard()
    {
        $categoryModel = new CategoryUserModel();
        $listCategory = $categoryModel->getCategoryDashboard();

        $productModel = new ProductUserModel();
        $listProduct = $productModel->getProductDashboard();

        $userModel = new UserModel2();
        $user = $userModel->getCurrentUser();


        include 'app/Views/Users/index.php';
    }

    public function myAccount()
    {
        $userModel = new UserModel2();
        $user = $userModel->getCurrentUser();
        include 'app/Views/Users/my-account.php';
    }

    public function accountDetail()
    {
        $userModel = new UserModel2();
        $user = $userModel->getCurrentUser();
        include 'app/Views/Users/layouts/header.php';

        include 'app/Views/Users/account-detail.php';
    }

    public function accountUpdate()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->changePassword();

            $userModel = new UserModel2();
            $user = $userModel->getCurrentUser();

            // Thêm ảnh
            $uploadDir = 'assets/Users/upload/';
            $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
            $destPath = $user->image; // Giữ nguyên đường dẫn ảnh cũ ban đầu

            if (!empty($_FILES['image']['name'])) { // Kiểm tra nếu có ảnh mới được tải lên
                $fileTmpPath = $_FILES['image']['tmp_name'];
                $fileType = mime_content_type($fileTmpPath);
                $fileName = basename($_FILES['image']['name']);
                $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

                $newFileName = uniqid() . '.' . $fileExtension;

                if (in_array($fileType, $allowedTypes)) {
                    $newDestPath = $uploadDir . $newFileName;
                    if (move_uploaded_file($fileTmpPath, $newDestPath)) {
                        // Xóa ảnh cũ (nếu có)
                        if (!empty($user->image) && file_exists($user->image)) {
                            unlink($user->image);
                        }
                        $destPath = $newDestPath; // Cập nhật đường dẫn ảnh mới
                    } else {
                        $_SESSION['message'] = 'Không thể tải lên ảnh mới';
                        header("Location: " . BASE_URL . "?act=account-detail");
                        exit();
                    }
                } else {
                    $_SESSION['message'] = 'Định dạng ảnh không hợp lệ';
                    header("Location: " . BASE_URL . "?act=account-detail");
                    exit();
                }
            }

            // Cập nhật thông tin người dùng
            $message = $userModel->updateCurrentUser($destPath);

            if ($message) {
                $_SESSION['message'] = 'Chỉnh sửa thành công';
                header("Location: " . BASE_URL . "?act=account-detail");
                exit();
            } else {
                $_SESSION['message'] = 'Chỉnh sửa không thành công';
                header("Location: " . BASE_URL . "?act=account-detail");
                exit();
            }
        }
    }


    public function changePassword()
    {
        // Nếu không nhập bất kỳ trường nào, bỏ qua việc thay đổi mật khẩu
        if (empty($_POST['current-password']) && empty($_POST['new-password']) && empty($_POST['confirm-password'])) {
            return;
        }

        // Nếu chỉ nhập một phần, yêu cầu nhập đủ thông tin
        if (
            empty($_POST['current-password']) ||
            empty($_POST['new-password']) ||
            empty($_POST['confirm-password'])
        ) {
            $_SESSION['errorPassword'] = 'Vui lòng nhập đầy đủ thông tin để thay đổi mật khẩu';
            header("Location: " . BASE_URL . "?act=account-detail");
            exit();
        }

        // Kiểm tra mật khẩu mới và xác nhận khớp nhau
        if ($_POST['new-password'] !== $_POST['confirm-password']) {
            $_SESSION['errorPassword'] = 'Mật khẩu mới và xác nhận mật khẩu không khớp';
            header("Location: " . BASE_URL . "?act=account-detail");
            exit();
        }

        $userModel = new UserModel2();
        $currentUser = $userModel->getCurrentUser();

        // Kiểm tra mật khẩu cũ có khớp không
        if (password_verify($_POST['current-password'], $currentUser->password)) {
            // Nếu đúng, cập nhật mật khẩu
            $newPasswordHash = password_hash($_POST['new-password'], PASSWORD_DEFAULT);
            $userModel->updatePassword($newPasswordHash);
            $_SESSION['passwordSuccess'] = 'Mật khẩu đã được thay đổi thành công';
        } else {
            // Nếu sai, thông báo lỗi
            $_SESSION['errorPassword'] = 'Mật khẩu cũ không đúng';
            header("Location: " . BASE_URL . "?act=account-detail");
            exit();
        }
    }

    public function showShop()
    {
        $productModel = new ProductUserModel();
        $listProduct = $productModel->getDataShop();

        $categoryModel = new CategoryUserModel;
        $userModel = new UserModel2();
        $user = $userModel->getCurrentUser();


        if (isset($_GET['category_id'])) {
            $category = $categoryModel->getCategoryById($_GET['category_id']);
        }

        $listCategory = $categoryModel->getCategoryDashBoard();
        $stock = $categoryModel->getProductStock();

        if (isset($_GET['instock'])) {
            $listProduct = array_filter($listProduct, function ($product) {
                return $product->stock > 0;
            });
        }
        if (isset($_GET['outstock'])) {
            $listProduct = array_filter($listProduct, function ($product) {
                return $product->stock == 0;
            });
        }
        if ((isset($_GET['min']) && is_numeric($_GET['min'])) || (isset($_GET['max']) && is_numeric($_GET['max']))) {
            $minPrice = isset($_GET['min']) ? (float) $_GET['min'] : null;
            $maxPrice = isset($_GET['max']) ? (float) $_GET['max'] : null;

            $listProduct = array_filter($listProduct, function ($product) use ($minPrice, $maxPrice) {
                $price = !empty($product->price_sale) ? $product->price_sale : $product->price;

                // Kiểm tra giá trị min
                if (!is_null($minPrice) && $price < $minPrice) {
                    return false;
                }

                // Kiểm tra giá trị max
                if (!is_null($maxPrice) && $price > $maxPrice) {
                    return false;
                }

                return true;
            });
        }
        if (isset($_GET['product-name'])) {
            $listProduct = $productModel->getDataShopName();
        }

        include 'app/Views/Users/shop.php';
    }

    public function productDetail()
    {
        $productModel = new ProductUserModel();
        $product = $productModel->getProductById();
        $productImage = $productModel->getProductImageById();

        $userModel = new UserModel2();
        $user = $userModel->getCurrentUser();

        $otherProduct = $productModel->getOtherProduct($product->category_id, $product->id);

        $comment = $productModel->getComment($product->id);

        foreach ($comment as $key => $value) {
            $rating = $productModel->getCommentByUser($product->id, $value->user_id);
            if ($rating) {
                $comment[$key]->rating = $rating->rating;
            } else {
                $comment[$key]->rating = null;
            }
        }
        $ratingProduct = $productModel->getRating($product->id);
        $ratingAvg = $productModel->avgRating($product->id);


        include 'app/Views/Users/product-detail.php';
    }

    public function writeComment()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $productModel = new ProductUserModel();
            $productModel->saveRating();
            $productModel->saveComment();
        }
        header("Location:" . BASE_URL . "?act=product-detail&product_id=" . $_POST['productId']);
    }

    public function addToCart(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $cartModel = new CartUserModel();
            $data = $cartModel->addCartModel();
            echo json_encode($data);
        }
    }

    public function showToCart(){
        $cartModel = new CartUserModel();
        $data = $cartModel->showCartModel();
        echo json_encode($data);
    }

    public function updateToCart(){
        $cartModel = new CartUserModel();
        $data = $cartModel->updateCartModel();
        echo json_encode($data);
    }

    public function shoppingCart(){
        $cartModel = new CartUserModel();
        $data = $cartModel->showCartModel();
        include 'app/Views/Users/shopping-cart.php';
    }

    public function checkout()
    {
        $userModel = new UserModel2();
        $currentUser = $userModel->getCurrentUser();

        $cartModel = new CartUserModel();
        $products = $cartModel->showCartModel();
        include 'app/Views/Users/check-out.php';
    }


    public function submitCheckout()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $cartModel = new CartUserModel();
        $products = $cartModel->showCartModel();


        $orderModel = new OrderUserModel();
        $addOrder = $orderModel->order($products);
        if($addOrder){
            $cartModel->deleteCartDetail();

            header("Location:" . BASE_URL);
        }
        }
}

 public function showOrder(){
    $orderModel = new OrderUserModel();
    $orders = $orderModel->getAllOrder();
    include 'app/Views/Users/show-order.php';
 }


 public function showOrderDetail(){
    $orderModel = new OrderUserModel();
    $order_detail = $orderModel->getOrderDetail();
    include 'app/Views/Users/show-order-detail.php';
 }

 public function cancelOrder(){
    $orderModel = new OrderUserModel();
    $orderModel->cancelOrderModel();
    header("Location: ". BASE_URL . "?act=show-order" );
 }
}