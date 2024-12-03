<?php
class CommentRatingController extends ControllerAdmin{
    public function showComment(){
        $productModel = new ProductModel();
        $listProduct = $productModel->getAllProduct();

        $commentRatingModel = new CommentRatingModel();

        foreach($listProduct as $key => $value){
            $listProduct[$key]->avgRating = $commentRatingModel->avgRating($value->id);
            $listProduct[$key]->countComment = $commentRatingModel->countComment($value->id);
        }
        include 'app/Views/Admin/comment.php';
    }

    public function showCommentDetail(){

        $productModel = new ProductModel();
        $listProduct = $productModel->getAllProduct();

        $commentRatingModel = new CommentRatingModel();
        $commentDetail = $commentRatingModel->showCommentDetail();


        include 'app/Views/Admin/comment-detail.php';
    }
}