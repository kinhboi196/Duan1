<?php
class HomeController extends ControllerAdmin
{
    public function dashboard()
    {
        $productModel = new ProductModel();
        $listProduct = $productModel->getProductAdminDashboard();

        include 'app/Views/Admin/index.php';
    }
    public function showAllProduct()
    {
        $producModel = new ProductModel();
        $listProduct = $producModel->getAllProduct();
        include 'app/Views/Admin/index.php';
    }
}
?>