<?php

class ProductModel{
    public $db ;
    public function __construct(){
        $this->db = new Database();
    }

    public function getProductAdminDashboard() {
        $sql = "SELECT * FROM products ORDER BY RAND() LIMIT 12";
        $query = $this->db->pdo->query($sql);
        $result = $query->fetchAll();
        return $result;
    }

    public function getAllProduct(){
        $sql = "
        SELECT products.id, products.name, products.price, products.price_sale, products.category_id, products.stock, products.image_main, categories.name AS categoryName FROM products join categories on products.category_id = categories.id
        ";
        $query = $this->db->pdo->query($sql);
        $result = $query ->fetchAll();
        return $result;
    }
       public function addProductToDB($destPath){
        $name = $_POST['name'];
        $category = $_POST['category'];
        $price = $_POST['price'];
        $pricesale = $_POST['pricesale'];
        $stock = $_POST['stock'];
        $description = $_POST['description'];
        $now = date('Y-m-d H:i:s');
        $imageDes = "$destPath";

        $sql= "
        INSERT INTO products( name, category_id, description, price, price_sale, stock, image_main, created_at, updated_at) VALUES (:name, :category_id, :description, :price, :price_sale, :stock, :image_main, :created_at, :updated_at );
        ";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':category_id', $category);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':price_sale', $pricesale);
        $stmt->bindParam(':stock', $stock);
        $stmt->bindParam(':image_main', $imageDes);
        $stmt->bindParam(':created_at', $now);
        $stmt->bindParam(':updated_at', $now);

        if($stmt->execute()){
            $lastInsertId = $this->db->pdo->lastInsertId();
            return $lastInsertId;
        }else{
            return false;
        }
       }

       public function addGaragyImage($destPathImage, $idProduct){
        $sql = "
            INSERT INTO product_image(product_id, image) VALUES (:product_id, :image)
        ";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindParam(":product_id", $idProduct);
        $stmt->bindParam(":image", $destPathImage);
        return $stmt->execute();
       }

       public function getProductById(){
        $id = $_GET['id'];
        $sql = "
        select * from products where id = :id";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);

        if($stmt->execute()){
            return $stmt->fetch();
        }

        return false;
    }
    public function getProductImageByID(){
        $id = $_GET['id'];
        $sql = "
        SELECT * FROM product_image WHERE product_id = :product_id";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindParam(':product_id', $id);
        if($stmt->execute()){
            return $stmt->fetchAll();
        }
        return false;
    }
      

    public function deleteProductToDb(){
        $id = $_GET['id'];
    
        // Xóa các bản ghi trong bảng product_image trước
        $sqlProductImage = "
        DELETE FROM product_image WHERE product_id = :product_id";
        $stmt = $this->db->pdo->prepare($sqlProductImage);
        $stmt->bindParam(':product_id', $id);
        $stmt->execute(); // Thực hiện xóa trong product_image trước
    
        // Sau đó xóa bản ghi trong bảng products
        $sqlProduct = "
        DELETE FROM products WHERE id = :id";
        $stmt2 = $this->db->pdo->prepare($sqlProduct);
        $stmt2->bindParam(':id', $id);
    
        // Kiểm tra kết quả
        if ($stmt2->execute()) {
            return true;
        } else {
            return false;
        }
    }
     
    public function updateProductToDB($destPath){
        $id = $_GET['id'];
        $name = $_POST['name'];
        $category = $_POST['category'];
        $price = $_POST['price'];
        $pricesale = $_POST['pricesale'];
        $stock = $_POST['stock'];
        $description = $_POST['description'];
        $now = date('Y-m-d H:i:s');
        $imageDes = "$destPath";

        $sql= "
        UPDATE `products` SET `name`=:name,`category_id`=:category_id,`description`=:description,`price`=:price,`price_sale`=:price_sale,`stock`=:stock,`image_main`=:image_main,`updated_at`=:updated_at WHERE id = :id
        ";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':category_id', $category);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':price_sale', $pricesale);
        $stmt->bindParam(':stock', $stock);
        $stmt->bindParam(':image_main', $imageDes);
        $stmt->bindParam(':updated_at', $now);
        $stmt->bindParam(':id', $id);

        return $stmt->execute();        
    }
}