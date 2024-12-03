<?php
class CategoryUserModel
{
    public $db;
    public function __construct()
    {
        $this->db = new Database();
    }

    public function getCategoryDashBoard()
    {
        $sql = "select * from categories";
        $query = $this->db->pdo->query($sql);
        $result = $query->fetchAll();
        return $result;
    }

    public function getCategoryById($id)
    {
        $sql = "select * from categories where id = :id";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result;
    }

    public function getProductStock()
    {
        $sql1 = "SELECT COUNT(id) as instock FROM products WHERE stock > 0";
        $query1 = $this->db->pdo->query($sql1);
        $inStock = $query1->fetch();

        $sql2 = "SELECT COUNT(id) as outstock FROM products WHERE stock = 0";
        $query2 = $this->db->pdo->query($sql2);
        $outStock = $query2->fetch();

        

        return [$inStock, $outStock];
    }
}
