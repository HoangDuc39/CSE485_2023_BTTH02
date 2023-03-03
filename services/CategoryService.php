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
 
}