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
            header("location: index.php?controller=category");
        }        

        include("views/category/add_category.php");
    }
    public function update(){
        $id = $_GET['id'];
        $categoryService = new CategoryService();
        $article = $categoryService->getCategoryById($id);

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $category = trim($_POST["category"]);
            $categoryService = new CategoryService();
            $article = $categoryService->UpdateCategory($category,$id);
            header("location: index.php?controller=category");
        }
        include("views/category/edit_category.php");
    }
    public function delete(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
           $id = trim($_POST["id"]);
           $categoryService = new CategoryService();
           $articles = $categoryService->DeleteCategory($id);
           header("location: index.php?controller=category");
        }        
   
        include("views/category/delete_category.php");
    }
}
?>