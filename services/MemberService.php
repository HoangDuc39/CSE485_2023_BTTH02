<?php
include("configs/DBConnection.php");
class MemberService{
    public function getAllAuthor(){
        // 4 bước thực hiện
       $dbConn = new DBConnection();
       $conn = $dbConn->getConnection();

        // B2. Truy vấn
        $sql = "select * from tacgia;";     
       // $stmt = $conn->query($sql);
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        $articles = $stmt->fetchAll();
        return $articles;
    }
 
}