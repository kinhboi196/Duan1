<?php
class ProductUserModel
{
    public $db;
    public function __construct()
    {
        $this->db = new Database();
    }

    public function getProductDashboard()
    {
        $sql = "SELECT * FROM products ORDER BY RAND() LIMIT 12";
        $query = $this->db->pdo->query($sql);
        $result = $query->fetchAll();
        return $result;
    }

    public function getDataShop()
    {
        $sql = "SELECT * FROM products";
        if (isset($_GET['category_id'])) {
            $sql = $sql . " where category_id = :category_id";
            $stmt = $this->db->pdo->prepare($sql);
            $stmt->bindParam(':category_id', $_GET['category_id']);
        } else {
            $stmt = $this->db->pdo->prepare($sql);
        }



        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function getDataShopName()
    {
        $productName = $_GET['product-name'];
        $sql = "SELECT * FROM products WHERE name LIKE '%$productName%'";
        $query = $this->db->pdo->query($sql);
        $result = $query->fetchAll();
        return $result;

    }

    public function getProductById(){
        if(isset($_GET['product_id'])){
            $sql = "SELECT * FROM products WHERE id = :id";
            $stmt = $this->db->pdo->prepare($sql);
            $stmt->bindParam(':id', $_GET['product_id']);

            $stmt->execute();
            $result = $stmt->fetch();

            
            return $result;
        }
    }

    public function getProductImageById(){
        if(isset($_GET['product_id'])){
            $sql = "SELECT image_main FROM products WHERE id = :id";
            $stmt = $this->db->pdo->prepare($sql);
            $stmt->bindParam(':id', $_GET['product_id']);

            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        }
    }
}