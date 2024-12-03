<?php
class UserModel2
{
    public $db;
    public function __construct()
    {
        $this->db = new Database();
    }

    public function getCurrentUser(){
        if(isset($_SESSION['users'])){
            $sql    = "select * from users where id = :id";
            $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindParam(':id', $_SESSION['users']['id']);
        $stmt->execute();
        return $stmt->fetch();
        }else{
            return false;
        }
    }

    public function changePassword(){
        if(isset($_SESSION['users'])){
            $user = $this->getCurrentUser();
            if(password_verify($_POST['current-password'], $user->password)){
                $hash = password_hash($_POST['new-password'], PASSWORD_BCRYPT);
                $sql    = "UPDATE users SET password = :password WHERE id = :id";
                $stmt = $this->db->pdo->prepare($sql);
                $stmt->bindParam(':password', $hash);
                $stmt->bindParam(':id', $_SESSION['users']['id']);
                return $stmt->execute();
            }


        }else{
            return false;
        }
    }

    public function updateCurrentUser($destPath){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $image = "$destPath";
        $sql = "
            UPDATE users 
            SET name=:name, 
            email=:email, 
            address=:address, 
            phone=:phone, 
            image=:image, 
            updated_at=:updated_at
            WHERE id = :id
        ";

        $now = date('Y-m-d H:i:s');

        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':image', $image);
        $stmt->bindParam(':updated_at', $now);
        $stmt->bindParam(':id', $_SESSION['users']['id']);

        return $stmt->execute();
    }

    public function updatePassword($newPasswordHash)
{
    $userId =  $_SESSION['users']['id']; // Hoặc cách lấy ID người dùng khác
    $query = "UPDATE users SET password = :password WHERE id = :id";
    $stmt = $this->db->pdo->prepare($query);
    $stmt->bindParam(':password', $newPasswordHash);
    $stmt->bindParam(':id', $userId);
    return $stmt->execute();
}

}