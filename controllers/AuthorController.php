<?php
include("services/AuthorService.php");

class AuthorController{
    
    // Hàm xử lý hành động index
    public function index(){
        // Nhiệm vụ 1: Tương tác với Services/Models
        $AuthorService = new AuthorService();
        $articles = $AuthorService->getAllAuthor();
        // Nhiệm vụ 2: Tương tác với View
        include("views/author/author.php");
    }
    public function add(){

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $author = trim($_POST["author"]);
            $AuthorService = new AuthorService();
            $articles = $AuthorService->AddAuthor($author);
            header("location: index.php?controller=author");
        }        

        include("views/author/add_author.php");
    }
    public function update(){
        $id = $_GET['id'];
        $AuthorService = new AuthorService();
        $article = $AuthorService->getAuthorById($id);
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $author = trim($_POST["author"]);
            $AuthorService = new AuthorService();
            $article = $AuthorService->UpdateAuthor($author,$id);
            header("location: index.php?controller=author");
        }
        include("views/author/edit_author.php");
    }
    public function delete(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
           $id = trim($_POST["id"]);
           $AuthorService = new AuthorService();
           $articles = $AuthorService->DeleteAuthor($id);
           header("location: index.php?controller=author");
        }        
   
        include("views/author/delete_author.php");
    }
}
?>