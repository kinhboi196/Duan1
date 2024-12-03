<?php 
    class HomeModel{
        public $db ;
        public function __construct(){
            $this->db = new Database();
        }

        // public function getUsers(){
        //     $sql = "select * from users";
        //     $query = $this->db->pdo->query($sql);
        //     $result = $query->fetchAll();
        //     return $result;
        // }

        public function checkLogin() {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $sql = "select * from users where email = :email and role = 1";
            $stmt = $this->db->pdo->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            $result = $stmt->fetch();
            if($result && password_verify($password, $result->password)){
                return $result;
            }
            return false;

        }
    }