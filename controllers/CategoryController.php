<?php
include("services/CategoryService.php");

class CategoryController{
    
    // Hàm xử lý hành động index
    public function index(){
        // Nhiệm vụ 1: Tương tác với Services/Models
        $categoryService = new CategoryService();
        $articles = $categoryService->getAllCategory();
        // Nhiệm vụ 2: Tương tác với View
        include("views/category/category.php");
    }
  
}