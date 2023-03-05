<?php
include("configs/DBConnection.php");
class AuthorService{
    public function getAllAuthor(){
       
       $dbConn = new DBConnection();
       $conn = $dbConn->getConnection();

        
        $sql = "select * from tacgia;";     
      
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        $articles = $stmt->fetchAll();
        return $articles;
    }
    public function getAuthorById($id){
       $dbConn = new DBConnection();
       $conn = $dbConn->getConnection();

        $sql = "select ma_tgia,ten_tgia from tacgia where ma_tgia = :id;";     
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        $article = $stmt->fetch();
        return $article;
    }
    public function AddAuthor($author){
       $dbConn = new DBConnection();
       $conn = $dbConn->getConnection();

        
        $sql = "INSERT INTO tacgia (ma_tgia,ten_tgia) VALUES (NULL,:author)";     
       
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":author", $author);
        $stmt->execute();
    }
    public function UpdateAuthor($author,$id){
       $dbConn = new DBConnection();
       $conn = $dbConn->getConnection(); 
       $sql = "UPDATE tacgia SET ten_tgia= :author WHERE ma_tgia =:id"; 
       
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":author", $author);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
    }
    public function DeleteAuthor($id){
       $dbConn = new DBConnection();
       $conn = $dbConn->getConnection();

        $sql = "DELETE FROM tacgia WHERE ma_tgia  = :id";  
     
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
    }
}