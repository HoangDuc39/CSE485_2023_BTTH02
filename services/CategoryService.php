<?php
include("configs/DBConnection.php");
class CategoryService{
    public function getAllCategory(){
       
       $dbConn = new DBConnection();
       $conn = $dbConn->getConnection();

        
        $sql = "select * from theloai;";     
      
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        $articles = $stmt->fetchAll();
        return $articles;
    }
    public function getCategoryById($id){
       $dbConn = new DBConnection();
       $conn = $dbConn->getConnection();

        $sql = "select ma_tloai,ten_tloai from theloai where ma_tloai = :id;";     
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        $article = $stmt->fetch();
        return $article;
    }
    public function AddCategory($category){
       $dbConn = new DBConnection();
       $conn = $dbConn->getConnection();

        
        $sql = "INSERT INTO theloai (ma_tloai,ten_tloai) VALUES (NULL,:category)";     
       
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":category", $category);
        $stmt->execute();
    }
    public function UpdateCategory($category,$id){
       $dbConn = new DBConnection();
       $conn = $dbConn->getConnection(); 
       $sql = "UPDATE theloai SET ten_tloai= :category WHERE ma_tloai =:id"; 
       
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":category", $category);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
    }
    public function DeleteCategory($id){
       $dbConn = new DBConnection();
       $conn = $dbConn->getConnection();

        
        $sql = "DELETE FROM theloai WHERE ma_tloai  = :id";  
     
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
    }
}