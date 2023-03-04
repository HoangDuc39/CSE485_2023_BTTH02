<?php
include("configs/DBConnection.php");
include("models/Article.php");
class ArticleService{
    public function getAllArticles(){
        // 4 bước thực hiện
       $dbConn = new DBConnection();
       $conn = $dbConn->getConnection();

        // B2. Truy vấn
        $sql = "SELECT a.ma_bviet, a.tieude, a.ten_bhat, a.ma_tloai, a.tomtat, a.noidung,a.hinhanh
        FROM baiviet    AS a
        ORDER BY a.ma_bviet ASC ;";   
       // $stmt = $conn->query($sql);
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        $articles = $stmt->fetchAll();
        // B3. Xử lý kết quả
        // $articles = [];
        // while($row = $stmt->fetch()){
        //     $article = new Article($row['ma_bviet'],$row['tieude'], $row['ten_bhat'], $row['ten_tloai'], $row['tomtat'], $row['noidung'], $row['ten_tgia'], $row['hinhanh']);
        //     array_push($articles,$article);
        // }
        // Mảng (danh sách) các đối tượng Article Model

        return $articles;
    }
    public function getDetailArticles($id){
       $dbConn = new DBConnection();
       $conn = $dbConn->getConnection();
        // B2. Truy vấn
        $sql = "SELECT * FROM baiviet as bv
        JOIN tacgia    AS tg  ON bv.ma_bviet = tg.ma_tgia
        JOIN theloai      AS tl  ON bv.ma_bviet = tl.ma_tloai
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