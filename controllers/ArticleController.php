<?php
include("services/ArticleService.php");
class ArticleController{
    // Hàm xử lý hành động index
    public function index(){
        // Nhiệm vụ 1: Tương tác với Services/Models
        $articleService = new ArticleService();
        $articles = $articleService->getAllArticles();
        // Nhiệm vụ 2: Tương tác với View
        include("views/article/article.php");
    }
    
    public function add(){
        $articleService = new ArticleService();
        $articles = $articleService->getArticles();
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $tieude = trim($_POST["tieude"]);
            $tenbaihat = trim($_POST["tenbaihat"]);
            $theloai = trim($_POST["theloai"]);
            $tomtat = trim($_POST["tomtat"]);
            $noidung = trim($_POST["noidung"]);
            $tacgia = trim($_POST["tacgia"]);
            $hinhanh = trim($_POST["hinhanh"]);
            $articleService = new ArticleService();
            $articles = $articleService->AddArticles($tieude,$tenbaihat,$theloai,$tomtat,$noidung,$tacgia,$hinhanh);
            header("location: index.php?controller=article");
        }        

        include("views/article/add_article.php");
    }

    public function update(){
        $id = $_GET['id'];
        $articleService = new ArticleService();
        $article = $articleService->getArticleById($id);
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $tieude = trim($_POST["tieude"]);
            $tenbaihat = trim($_POST["tenbaihat"]);
            $theloai = trim($_POST["theloai"]);
            $tomtat = trim($_POST["tomtat"]);
            $noidung = trim($_POST["noidung"]);
            $tacgia = trim($_POST["tacgia"]);
            $hinhanh = trim($_POST["hinhanh"]);
            $articleService = new ArticleService();
            $article = $articleService->UpdateArticles($id,$tieude,$tenbaihat,$theloai,$tomtat,$noidung,$tacgia,$hinhanh);
            header("location: index.php?controller=article");
        }
        include("views/article/edit_article.php");
    }
    public function delete(){
         if($_SERVER["REQUEST_METHOD"] == "POST"){
            $id = trim($_POST["id"]);
            $articleService = new ArticleService();
            $articles = $articleService->DeleteArticles($id);
            header("location: index.php?controller=article");
         }       
        include("views/article/delete_article.php");
    }
}