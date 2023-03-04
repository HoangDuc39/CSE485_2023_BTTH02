<?php

include("services/ArticleService.php");
class HomeController{
    public function index(){

        $articleService = new ArticleService();
        $articles = $articleService->getAllArticles();

        include("views/home/index.php");
    }
    public function show() {
        $id = isset($_GET['id'])? $_GET['id']: 2;
        $articleService = new ArticleService();
        $article = $articleService->getDetailArticles($id);
        include("views/home/detail.php");
    }
    
    public function admin(){

        $adminService = new ArticleService();
        $admins = $adminService->getAllCount();
        include("views/admin/index.php");
    }
    
}
?>