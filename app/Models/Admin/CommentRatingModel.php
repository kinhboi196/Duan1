<?php
class CommentRatingModel
{
    public $db;
    public function __construct()
    {
        $this->db = new Database();
    }

    public function avgRating($productId)
    {
        $sql = "SELECT avg(rating) as avgRating FROM product_rating WHERE product_id = :product_id";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindParam(":product_id", $productId);
        $stmt->execute();
        return $stmt->fetch()->avgRating;
    }

    public function countComment($productId)
    {
        $sql = "SELECT count(id) as countComment FROM product_comment WHERE product_id = :product_id";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindParam(':product_id', $productId);
        $stmt->execute();
        return $stmt->fetch()->countComment;
    }

    public function showCommentDetail()
    {
        $product_id = $_GET['id'];
        $sql = 'SELECT * FROM product_comment WHERE product_id = :product_id';
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindParam(':product_id', $product_id);
        $stmt->execute();
        return $stmt->fetchAll();
    }

}
?>