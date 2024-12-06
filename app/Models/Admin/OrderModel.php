<?php

class OrderModel{
    public $db;
    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllOrder()
{
    $sql = "SELECT * FROM `order`";
    $stmt = $this->db->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}

public function getOrderDetail(){
    $order_id = $_GET['order_id'];
    $sql = "SELECT order_detail.*, products.name, products.image_main, (order_detail.quantity * order_detail.price) AS total FROM
    order_detail JOIN products on order_detail.product_id = products.id WHERE order_detail.order_id = :order_id";
    $stmt = $this->db->pdo->prepare($sql);
    $stmt->bindParam("order_id", $order_id);
    $stmt->execute();
    return $stmt->fetchAll();
}

public function changeStatusModel(){
    $order_id = $_POST['order_id'];
    $status = $_POST['status'];
    $sql = "UPDATE `order` SET `status` = :status WHERE id = :order_id"; // Thêm dấu ':' trước 'order_id'
    $stmt = $this->db->pdo->prepare($sql);
    $stmt->bindParam(":status", $status); // Thêm dấu ':' trước 'status'
    $stmt->bindParam(":order_id", $order_id); // Thêm dấu ':' trước 'order_id'
    return $stmt->execute();
}

}