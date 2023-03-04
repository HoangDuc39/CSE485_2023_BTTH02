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
    public function add(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $category = trim($_POST["category"]);
            $categoryService = new CategoryService();
            $articles = $categoryService->AddCategory($category);
        }        

        include("views/category/add_category.php");
    }
    public function delete(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
           $id = trim($_POST["id"]);
           $categoryService = new CategoryService();
           $articles = $categoryService->DeleteCategory($id);

        }        
   
        include("views/category/delete_category.php");
    }
}
?>