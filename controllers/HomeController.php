<?php
include("services/ArticleService.php");
class HomeController{
    public function index(){
        // Nhiệm vụ 1: Tương tác với Services/Models
        $articelService = new ArticleService();
        $articles = $articelService->getAllArticles();
        // Nhiệm vụ 2: Tương tác với View
        include("views/home/index.php");
    }
    public function show() {
        $id = isset($_GET['id'])? $_GET['id']: 2;
        $articelService = new ArticleService();
        $article = $articelService->getDetailArticles($id);
        include("views/home/detail.php");
    }
    
    public function admin(){
        // Nhiệm vụ 1: Tương tác với Services/Models
        $adminService = new ArticleService();
        $admins = $adminService->getAllCount();
        // Nhiệm vụ 2: Tương tác với View
        include("views/admin/index.php");
    }
    
}