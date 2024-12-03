<?php
    class UserModel{
        public $db ;
        public function __construct(){
            $this->db = new Database();
        }

        public function getAllData(){
            $sql = "select * from users";
            $query = $this->db->pdo->query($sql);
            $result = $query->fetchAll();

            return $result;
        }
        
        public function addUserToDB($destPath){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $address = $_POST['address'];
            $phone = $_POST['phone'];
            $role = $_POST['role'];
            $image = "$destPath";

            $sql = "
                INSERT INTO users(name, email, password, address, phone, image, created_at, updated_at, role) 
                VALUES(:name, :email, :password, :address, :phone, :image, :created_at, :updated_at, :role)
            ";

            $now = date('Y-m-d H:i:s');

            $stmt = $this->db->pdo->prepare($sql);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':address', $address);
            $stmt->bindParam(':phone', $phone);
            $stmt->bindParam(':image', $image);
            $stmt->bindParam(':created_at', $now);
            $stmt->bindParam(':updated_at', $now);
            $stmt->bindParam(':role', $role);

            return $stmt->execute();
        }

        public function getUserById(){
            $id = $_GET['id'];
            $sql = "select * from users where id = :id";
            $stmt = $this->db->pdo->prepare($sql);
            $stmt->bindParam(':id', $id);

            if($stmt->execute()){
                return $stmt->fetch();
            }

            return false;
        }

        public function updateUserToDB($destPath){
            $user = $this->getUserById();
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'] != "" ? password_hash($_POST['password'], PASSWORD_BCRYPT) : $user->password;
            $address = $_POST['address'];
            $phone = $_POST['phone'];
            $role = $_POST['role'];
            $image = "$destPath";
            $sql = "
                UPDATE users 
                SET name=:name, 
                email=:email, 
                password=:password, 
                address=:address, 
                phone=:phone, 
                image=:image, 
                updated_at=:updated_at, 
                role=:role 
                WHERE id = :id
            ";

            $now = date('Y-m-d H:i:s');

            $stmt = $this->db->pdo->prepare($sql);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':address', $address);
            $stmt->bindParam(':phone', $phone);
            $stmt->bindParam(':image', $image);
            $stmt->bindParam(':updated_at', $now);
            $stmt->bindParam(':role', $role);
            $stmt->bindParam(':id', $_GET['id']);

            return $stmt->execute();
        }
        public function deleteUser(){
            $id = $_GET['id'];
            $sql = "DELETE FROM users WHERE id = :id";
            $stmt = $this->db->pdo->prepare($sql);
            $stmt->bindParam(':id', $id);
            return $stmt->execute();
        }
    }
?>