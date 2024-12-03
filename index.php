<?php
session_start();

// database
include 'app/Database/Database.php';

// model admin
include 'app/Models/Admin/HomeModel.php';
include 'app/Models/Admin/UserModel.php';
include 'app/Models/Admin/CategoryModel.php';
include 'app/Models/Admin/ProductModel.php';

// model user
include 'app/Models/Users/CategoryUserModel.php';
include 'app/Models/Users/ProductUserModel.php';
include 'app/Models/Users/LoginModel.php';
include 'app/Models/Users/UserModel2.php';

// controller admin
include 'app/Controllers/Admin/ControllerAdmin.php';
include 'app/Controllers/Admin/LoginController.php';
include 'app/Controllers/Admin/HomeController.php';
include 'app/Controllers/Admin/UserController.php';
include 'app/Controllers/Admin/CategoryController.php';
include 'app/Controllers/Admin/ProductController.php';

// Controller User
include 'app/Controllers/Users/DashboardController.php';
include 'app/Controllers/Users/LoginUserController.php';

const BASE_URL = "http://localhost/xuongduan1/";

// router
include 'router/web.php';

// echo password_hash('123456', PASSWORD_BCRYPT);