<?php
class CartUserModel
{
    public $db;
    public function __construct()
    {
        $this->db = new Database();
    }

    public function addCartModel()
    {
        $productId = $_POST['productId'];
        $quantity = $_POST['quantity'];
        $userId = $_SESSION['users']['id'];
        $now = date('Y-m-d H:i:s');

        $sql = "select * from cart where user_id = :user_id";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindParam(':user_id', $userId);
        $stmt->execute();
        $cart = $stmt->fetch();
        if (!$cart) {
            $sql = "INSERT INTO `cart` (`user_id`, `created_at`, `updated_at`) VALUES (:user_id, :created_at, :updated_at)";
            $stmt = $this->db->pdo->prepare($sql);
            $stmt->bindParam(':user_id', $userId);
            $stmt->bindParam(':created_at', $now);
            $stmt->bindParam(':updated_at', $now);

            if ($stmt->execute()) {
                $cartId = $this->db->pdo->lastInsertId();
            } else {
                return false;
            }
        } else {
            $cartId = $cart->id;
        }

        $sql = "select * from cart_detail where cart_id = :cart_id and product_id = :product_id";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindParam(":cart_id", $cartId);
        $stmt->bindParam(":product_id", $productId);
        $stmt->execute();
        $cartDetail = $stmt->fetch();

        if($cartDetail) {
            $sql = "UPDATE `cart_detail` SET `quantity` = :quantity WHERE id = :cart_detail_id";
            $stmt = $this->db->pdo->prepare($sql);
            $stmt->bindParam("cart_detail_id", $cartDetail->id);
            $newQuantity = intval($cartDetail->quantity) + intval($quantity);
            $stmt->bindParam(":quantity", $newQuantity);
            return $stmt->execute();
        }else{
            $sql = "INSERT INTO `cart_detail`(`cart_id`, `product_id`, `quantity`) VALUES (:cart_id, :product_id, :quantity)";
            $stmt = $this->db->pdo->prepare($sql);
            $stmt->bindParam(":cart_id", $cartId);
            $stmt->bindParam(":product_id", $productId);
            $stmt->bindParam(":quantity", $quantity);
            return $stmt->execute();

        }
    }
}
