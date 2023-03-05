<?php
include("services/AuthorService.php");

class AuthorController{
    
    // Hàm xử lý hành động index
    public function index(){
        // Nhiệm vụ 1: Tương tác với Services/Models
        $AuthorService = new AuthorService();
        $articles = $AuthorService->getAllAuthor();
        // Nhiệm vụ 2: Tương tác với View
        include("views/Author/Author.php");
    }
    public function add(){

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $Author = trim($_POST["Author"]);
            $AuthorService = new AuthorService();
            $articles = $AuthorService->AddAuthor($Author);
            header("location: index.php?controller=Author");
        }        

        include("views/Author/add_Author.php");
    }
    public function update(){
        $id = $_GET['id'];
        $AuthorService = new AuthorService();
        $article = $AuthorService->getAuthorById($id);
        echo "<pre>";
        print_r($article);
        echo "</pre>";
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $Author = trim($_POST["Author"]);
            $AuthorService = new AuthorService();
            $article = $AuthorService->UpdateAuthor($Author,$id);
            header("location: index.php?controller=Author");
        }
        include("views/Author/edit_Author.php");
    }
    public function delete(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
           $id = trim($_POST["id"]);
           $AuthorService = new AuthorService();
           $articles = $AuthorService->DeleteAuthor($id);
           header("location: index.php?controller=Author");
        }        
   
        include("views/Author/delete_Author.php");
    }
}
?>