<?php
class LoginUserController
{
    public function login()
    {
        include 'app/Views/Users/login.php';
    }

    public function checkValidate()
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        if ($name != "" && $email != "" && $password != "") {
            return true;
        } else {
            $_SESSION['error'] = "Bạn nhập thiếu thông tin";
            return false;
        }
    }

    public function postLogin()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $loginModel = new LoginModel();
            $dataUsers = $loginModel->checkLogin();
            if ($dataUsers) {
                $_SESSION['users'] = [
                    'id' => $dataUsers->id,
                    'name' => $dataUsers->name,
                    'email' => $dataUsers->email,
                ];
                header(header: "Location: " . BASE_URL . "");
                exit();
            } else {
                $_SESSION['error'] = "Email hoặc password không đúng";
                header(header: "Location: " . BASE_URL . "?act=login");
                exit();
            }
        }
    }

    public function logout()
    {
        if (isset($_SESSION['users'])) {
            unset($_SESSION['users']);
        }
        header("Location: " . BASE_URL);
        exit;
    }


    public function register()
    {

        include 'app/Views/Users/register.php';
    }

    public function postRegister()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if(!$this->checkValidate()){
                header(header: "Location: " . BASE_URL . "?act=register");
                exit();
            }
            $loginModel = new LoginModel();
            $message = $loginModel->addUserToDB();

            if ($message) {
                $_SESSION['message'] = 'Đăng ký thành công';
                header(header: "Location: " . BASE_URL . "?act=login");
                exit();
            } else {
                $_SESSION['message'] = 'Đăng ký không thành công';
                header(header: "Location: " . BASE_URL . "?act=register");
                exit();
            }
        }
    }


}