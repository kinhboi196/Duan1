<?php

$role = isset($_GET['role']) ? $_GET['role'] : "user";
$act = isset($_GET['act']) ? $_GET['act'] : "";

if($role == "user"){
    switch($act){
        case '': {
            $dashBoardController = new DashboardController();
            $dashBoardController->dashboard();
            break;
        }
        case 'login': {
            $loginController = new LoginUserController();
            $loginController->login();
            break;
        }
        case 'post-login': {
            $loginController = new LoginUserController();
            $loginController->postLogin();
            break;
        }
        case 'logout': {
            $loginController = new LoginUserController();
            $loginController->logout();
            break;
        }
        case 'register': {
            $loginController = new LoginUserController();
            $loginController->register();
            break;
        }
        case 'post-register': {
            $loginController = new LoginUserController();
            $loginController->postRegister();
            break;
        }
        case 'my-account': {
            $dashBoardController = new DashboardController();
            $dashBoardController->myAccount();
            break;
        }
        case 'account-detail': {
            $dashBoardController = new DashboardController();
            $dashBoardController->accountDetail();
            break;
        }
        case 'account-update': {
            $dashBoardController = new DashboardController();
            $dashBoardController->accountUpdate();
            break;
        }
        case 'shop': {
            $dashBoardController = new DashboardController();
            $dashBoardController->showShop();
            break;
        }
        case 'product-detail': {
            $dashBoardController = new DashboardController();
            $dashBoardController->productDetail();
            break;
        }
        case 'write-comment': {
            $dashBoardController = new DashboardController();
            $dashBoardController->writeComment();
            break;
        }
    }
}else{

switch($act) {
    // http://localhost/xuongduan1//?role=admin&act=home
    case 'home': {
        $homeController = new HomeController();
        $homeController->dashboard();
        break;
    }
    // http://localhost/xuongduan1//?role=admin&act=login
    case 'login': {
        $loginController = new LoginController();
        $loginController->login();
        break;
    }
    // http://localhost/xuongduan1//?role=admin&act=post-login
    case 'post-login': {
        $loginController = new LoginController();
        $loginController->postLogin();
        break;
    }
    case 'logout': {
        $loginController = new LoginController();
        $loginController->logout();
        break;
    }
    case 'all-user': {
        $userController = new UserController();
        $userController->getAllUser();
        break;
    }
    case 'add-user': {
        $userController = new UserController();
        $userController->addUser();
        break;
    }
    case 'update-user': {
        $userController = new UserController();
        $userController->updateUser();
        break;
    }
    case 'update-post-user': {
        $userController = new UserController();
        $userController->updatePostUser();
        break;
    }
    case 'post-add-user': {
        $userController = new UserController();
        $userController->addPostUser();
        break;
    }
    case 'delete-user': {
        $userController = new UserController();
        $userController->deleteUser();
        break;
    }
    case 'show-user': {
        $userController = new UserController();
        $userController->showUser();
        break;
    }

    case 'all-category': {
        $categoryController = new CategoryController();
        $categoryController->getAllCategory();
        break;
    }
    case 'add-category': {
        $categoryController = new CategoryController();
        $categoryController->addCategory();
        break;
    }
    case 'add-post-category': {
        $categoryController = new CategoryController();
        $categoryController->addPostCategory();
        break;
    }
    case 'delete-category': {
        $categoryController = new CategoryController();
        $categoryController->deleteCategory();
        break;
    }
    case 'update-category': {
        $categoryController = new CategoryController();
        $categoryController->updateCategory();
        break;
    }
    case 'update-post-category': {
        $categoryController = new CategoryController();
        $categoryController->updatePostCategory();
        break;
    }
    case 'show-category': {
        $categoryController = new CategoryController();
        $categoryController->showCategory();
        break;
    }

    case 'all-product': {
        $productController = new ProductController();
        $productController->showAllProduct();
        break;
    }
    case 'add-product': {
        $productController = new ProductController();
        $productController->addProduct();
        break;
    }
    case 'add-post-product': {
        $productController = new ProductController();
        $productController->addPostProduct();
        break;
    }
    case 'delete-product': {
        $productController = new ProductController();
        $productController->deleteProduct();
        break;
    }
    case 'update-product': {
        $productController = new ProductController();
        $productController->updateProduct();
        break;
    }
    case 'update-post-product': {
        $productController = new ProductController();
        $productController->updatePostProduct();
        break;
    }
    case 'show-product': {
        $productController = new ProductController();
        $productController->showProduct();
        break;
    }
    case 'comment-product': {
        $commentModel = new CommentRatingController();
        $commentModel->showComment();
        break;
    }
    case 'comment-detail': {
        $commentModel = new CommentRatingController();
        $commentModel->showCommentDetail();
        break;
    }
    case 'comment-reply': {
        $commentModel = new CommentRatingController();
        $commentModel->commentReply();
        break;
    }
    case 'comment-delete': {
        $commentModel = new CommentRatingController();
        $commentModel->commentDelete();
        break;
    }
    
    default: {
        // $homeController = new HomeController();
        // $homeController->dashboard();
        $commentRatingController = new CommentRatingController();
        $commentRatingController->showComment();
        break;
    }
}
}