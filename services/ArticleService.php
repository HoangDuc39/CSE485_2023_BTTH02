<?php
include("configs/DBConnection.php");
include("models/Article.php");
class ArticleService{
    public function getHomeArticles(){
       
       $dbConn = new DBConnection();
       $conn = $dbConn->getConnection();

        $sql = "SELECT a.ma_bviet, a.tieude, a.ten_bhat, a.ma_tloai, a.tomtat, a.noidung,a.hinhanh
        FROM baiviet    AS a
        ORDER BY a.ma_bviet ASC LIMIT 8;";   

        $stmt = $conn->prepare($sql);
        $stmt->execute();

        $articles = $stmt->fetchAll();
        return $articles;
    }
    public function getArticleById($id){
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();

        $sql = "SELECT * FROM baiviet as bv
            JOIN tacgia  AS tg  
            JOIN theloai  AS tl  
            where bv.ma_bviet = :id;";     
         $stmt = $conn->prepare($sql);
         $stmt->bindParam(":id", $id);
         $stmt->execute();
 
         $article = $stmt->fetch();
         return $article;
     }
    public function getArticles(){
       
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();
 
        $sql = "SELECT * FROM baiviet as bv
        JOIN tacgia    AS tg  ON bv.ma_bviet = tg.ma_tgia
        JOIN theloai      AS tl  ON bv.ma_bviet = tl.ma_tloai ;";      
 
         $stmt = $conn->prepare($sql);
         $stmt->execute();
 
         $articles = $stmt->fetchAll();
         return $articles;
     }
    public function getAllArticles(){
       
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();
 
        $sql = "SELECT a.ma_bviet, a.tieude, a.ten_bhat, a.ma_tloai, a.tomtat, a.noidung,a.hinhanh
        FROM baiviet    AS a
        ORDER BY a.ma_bviet ASC ;";     
 
         $stmt = $conn->prepare($sql);
         $stmt->execute();
 
         $articles = $stmt->fetchAll();
         return $articles;
     }
     public function AddArticles($tieude,$tenbaihat,$theloai,$tomtat,$noidung,$tacgia,$hinhanh){
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();
 
        $sql = "INSERT INTO baiviet (ma_bviet,tieude,ten_bhat,ma_tloai,tomtat,noidung,ma_tgia,hinhanh) 
        VALUES (NULL,:tieude,:tenbaihat,:theloai,:tomtat,:noidung,:tacgia,:hinhanh)";  
        
         $stmt = $conn->prepare($sql);
         $stmt->bindParam(":tieude", $tieude);
         $stmt->bindParam(":tenbaihat", $tenbaihat);
         $stmt->bindParam(":theloai", $theloai);
         $stmt->bindParam(":tomtat", $tomtat);
         $stmt->bindParam(":noidung", $noidung);
         $stmt->bindParam(":tacgia", $tacgia);
         $stmt->bindParam(":hinhanh", $hinhanh);
         $stmt->execute();
     }
     public function UpdateArticles($id,$tieude,$tenbaihat,$theloai,$tomtat,$noidung,$tacgia,$hinhanh){
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection(); 
        $sql = "SELECT * FROM baiviet as bv
            JOIN tacgia    AS tg  ON bv.ma_bviet = tg.ma_tgia
            JOIN theloai      AS tl  ON bv.ma_bviet = tl.ma_tloai 
            where ma_bviet = :id;";      
        
         $stmt = $conn->prepare($sql);
         $stmt->bindParam(":id", $id);
         $stmt->bindParam(":tieude", $tieude);
         $stmt->bindParam(":tenbaihat", $tenbaihat);
         $stmt->bindParam(":theloai", $theloai);
         $stmt->bindParam(":tomtat", $tomtat);
         $stmt->bindParam(":noidung", $noidung);
         $stmt->bindParam(":tacgia", $tacgia);
         $stmt->bindParam(":hinhanh", $hinhanh);
         $stmt->execute();
     }
     public function DeleteArticles($id){
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();

        $sql = "DELETE FROM baiviet WHERE ma_bviet = :id";
      
         $stmt = $conn->prepare($sql);
         $stmt->bindParam(":id", $id);
         $stmt->execute();
     }
    public function getDetailArticles($id){
       $dbConn = new DBConnection();
       $conn = $dbConn->getConnection();
        
        $sql = "SELECT * FROM baiviet as bv
        JOIN tacgia    AS tg  
        JOIN theloai      AS tl  
        WHERE ma_bviet = :id  ;";         
        

        $stmt = $conn->prepare($sql);
       $stmt->bindValue('id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $articles = $stmt->fetch(PDO::FETCH_ASSOC);

        return $articles;
    }
    public function getAllCount(){
        // 4 bước thực hiện
       $dbConn = new DBConnection();
       $conn = $dbConn->getConnection();

        // B2. Truy vấn
        $sql = "select (SELECT COUNT(*) FROM baiviet ) as table1Count, (SELECT COUNT(*) FROM theloai ) as table2Count , (SELECT COUNT(*) FROM tacgia ) as table3Count , (SELECT COUNT(*) FROM users )as table4Count;";          
       // $stmt = $conn->query($sql);
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        $admins = $stmt->fetchAll();
    
        return $admins;
    }
}