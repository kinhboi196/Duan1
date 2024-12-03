<?php
class ProductController extends ControllerAdmin
{
    public function showAllProduct()
    {
        $producModel = new ProductModel();
        $listProduct = $producModel->getAllProduct();
        include 'app/Views/Admin/products.php';
    }

    public function addProduct()
    {
        $categoryModel = new CategoryModel();
        $listCategory = $categoryModel->allCategory();


        include 'app/Views/Admin/add-product.php';
    }

    public function checkValidate()
    {
        $name = $_POST['name'];
        $category = $_POST['category'];
        $price = $_POST['price'];
        $stock = $_POST['stock'];

        if ($name != "" && $category != "" && $price != "" && $stock != "") {
            return true;
        } else {
            $_SESSION['error'] = "Bạn nhập thiếu thông tin";
            return false;
        }
    }
    public function addPostProduct()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (!$this->checkValidate()) {
                header(header: "Location: " . BASE_URL . "?role=admin&act=add-product");
                exit();
            }
            // them anh
            $uploadDir = 'assets/Admin/upload';
            $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
            $destPath = "";

            if (!empty($_FILES['image_main']['name'])) {
                $fileTmpPath = $_FILES['image_main']['tmp_name'];
                $fileType = mime_content_type($fileTmpPath);
                $fileName = basename($_FILES['image_main']['name']);
                $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

                $newFileName = uniqid() . '.' . $fileExtension;

                if (in_array($fileType, $allowedTypes)) {
                    $destPath = $uploadDir . $newFileName;
                    if (!move_uploaded_file($fileTmpPath, $destPath)) {
                        $destPath = "";
                    }
                }
            }
            $productModel = new ProductModel();
            $idProduct = $productModel->addProductToDB($destPath);
            if (!$idProduct) {
                $_SESSION['message'] = 'Thêm mới không thành công';
                header(header: "Location: " . BASE_URL . "?role=admin&act=all-product");
                exit();
            } 

            // them thu vien anh
            if (isset($_FILES['image'])) {
                foreach ($_FILES['image']['name'] as $key => $name) {
                    $destPathImage = "";
                    if (!empty($name)) {
                        $fileTmpPath = $_FILES['image']['tmp_name'][$key];
                        $fileType = mime_content_type($fileTmpPath);
                        $fileName = basename($name);
                        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
                        $newFileName = uniqid() . '.' . $fileExtension;
                        if (in_array($fileType, $allowedTypes)) {
                            $destPathImage = $uploadDir . $newFileName;
                            if (!move_uploaded_file($fileTmpPath, $destPathImage)) {
                                $destPathImage = "";
                            }
                        }
                    }
                    $productModel->addGaragyImage($destPathImage, $idProduct);
                }
            }

            $_SESSION['message'] = 'Thêm mới thành công';
                header(header: "Location: " . BASE_URL . "?role=admin&act=all-product");
                exit();
        }
    }

    public function deleteProduct()
    {
        if (!isset($_GET['id'])) {
            $_SESSION['message'] = "Vui lòng chọn Product cần xóa";
            header("Location: " . BASE_URL . "?role=admin&act=all-product");
            exit;
        }

        $productModel = new productModel();
         // Xóa ảnh
        $product = $productModel->getProductByID();
        if ($product->image_main  == "") {
            unlink($product->image_main);
        }

        // xoa anh trong product_image
        $listImage = $productModel->getProductImageByID();
        foreach($listImage as $key => $value ) {
            if ($value->image == "") {
                unlink($value->image );
        }
    }
        $message = $productModel->deleteProductToDB();
       


        if ($message) {
            $_SESSION['message'] = 'Xóa thành công';
            header(header: "Location: " . BASE_URL . "?role=admin&act=all-product");
            exit();
        } else {
            $_SESSION['message'] = 'Xóa không thành công';
            header(header: "Location: " . BASE_URL . "?role=admin&act=all-product");
            exit();
        }
    }

    public function updateProduct(){
        if (!isset($_GET['id'])) {
            $_SESSION['message'] = "Vui lòng chọn Product cần sửa";
            header("Location: " . BASE_URL . "?role=admin&act=all-product");
            exit;
        }
        $categoryModel = new CategoryModel();
        $listCategory = $categoryModel->allCategory();
        
        $productModel = new ProductModel();
        $product = $productModel->getProductById();
        $listProductImage =  $productModel->getProductImageByID();
        include 'app/Views/Admin/update-product.php';

    }

    public function updatePostProduct(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (!isset($_GET['id'])) {
                $_SESSION['message'] = "Vui lòng chọn Product cần sửa";
                header("Location: " . BASE_URL . "?role=admin&act=all-product");
                exit;
            }
            if (!$this->checkValidate()) {
                header(header: "Location: " . BASE_URL . "?role=admin&act=update-product&id" . $_GET['id']);
                exit();
            }

            $productModel = new ProductModel();
            $product = $productModel->getProductById();
            // chinh sua anh main
            $uploadDir = 'assets/Admin/upload';
            $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
            $destPath = $product->image_main;
            if (!empty($_FILES['image_main']['name'])) {
                $fileTmpPath = $_FILES['image_main']['tmp_name'];
                $fileType = mime_content_type($fileTmpPath);
                $fileName = basename($_FILES['image_main']['name']);
                $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

                $newFileName = uniqid() . '.' . $fileExtension;

                if (in_array($fileType, $allowedTypes)) {
                    $destPath = $uploadDir . $newFileName;
                    if (!move_uploaded_file($fileTmpPath, $destPath)) {
                        $destPath = "";
                    }
                    unlink($product->image_main);
                }
            }
            $productModel = new ProductModel();
            $message = $productModel->updateProductToDB($destPath);
            if (!$message) {
                $_SESSION['message'] = 'Chỉnh sửa không thành công';
                header(header: "Location: " . BASE_URL . "?role=admin&act=update-product&id" . $_GET['id'] );
                exit();
            } 

            // them thu vien anh
            // if (isset($_FILES['image'])) {
            //     foreach ($_FILES['image']['name'] as $key => $name) {
            //         $destPathImage = "";
            //         if (!empty($name)) {
            //             $fileTmpPath = $_FILES['image']['tmp_name'][$key];
            //             $fileType = mime_content_type($fileTmpPath);
            //             $fileName = basename($name);
            //             $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
            //             $newFileName = uniqid() . '.' . $fileExtension;
            //             if (in_array($fileType, $allowedTypes)) {
            //                 $destPathImage = $uploadDir . $newFileName;
            //                 if (!move_uploaded_file($fileTmpPath, $destPathImage)) {
            //                     $destPathImage = "";
            //                 }
            //             }
            //         }
            //         $productModel->addGaragyImage($destPathImage, $idProduct);
            //     }
            // }

            $_SESSION['message'] = 'Chinh sua thành công';
                header(header: "Location: " . BASE_URL . "?role=admin&act=all-product" );
                exit();
        }
    }

    public function showProduct()
    {
        if (!isset($_GET['id'])) {
            $_SESSION['message'] = "Vui lòng chọn Product cần xem";
            header("Location: " . BASE_URL . "?role=admin&act=all-product");
            exit;
        }

        $productModel = new ProductModel();
        $product = $productModel->getProductById();

        include 'app/Views/Admin/show-product.php';

    }
}

