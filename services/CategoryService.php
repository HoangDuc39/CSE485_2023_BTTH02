<?php
include("configs/DBConnection.php");
class CategoryService{
    public function getAllCategory(){
        // 4 bước thực hiện
       $dbConn = new DBConnection();
       $conn = $dbConn->getConnection();

        // B2. Truy vấn
        $sql = "select * from theloai;";     
       // $stmt = $conn->query($sql);
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        $articles = $stmt->fetchAll();
        return $articles;
    }
    public function AddCategory($category){
        // 4 bước thực hiện
       $dbConn = new DBConnection();
       $conn = $dbConn->getConnection();

        // B2. Truy vấn
        $sql = "INSERT INTO theloai (ma_tloai,ten_tloai) VALUES (NULL,:category)";     
       // $stmt = $conn->query($sql);
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":category", $category);
        $stmt->execute();
    }
    public function DeleteCategory($id){
        // 4 bước thực hiện
       $dbConn = new DBConnection();
       $conn = $dbConn->getConnection();

        // B2. Truy vấn
        $sql = "DELETE FROM theloai WHERE ma_tloai  = :id";  
       // $stmt = $conn->query($sql);
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
    }
}