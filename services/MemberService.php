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
    public function getAccount($username,$password){
        // 4 bước thực hiện
       $dbConn = new DBConnection();
       $pdo = $dbConn->getConnection(); 
               $sql = "SELECT id, username, password FROM users WHERE username = :username and password = :password";
               
               if($stmt = $pdo->prepare($sql)){
                   $param_username = trim($_POST["username"]);
                   $param_password = trim($_POST["password"]);
                   // Bind variables to the prepared statement as parameters
                   $stmt->bindParam("username", $param_username, PDO::PARAM_STR);
                   $stmt->bindParam("password", $param_password, PDO::PARAM_STR);
                
                   $stmt->execute();
                       // Check if username exists, if yes then verify password
                       if($stmt->rowCount() == 1){
                           if($row = $stmt->fetch()){
                               $id = $row["id"];
                               $username = $row["username"];
                               $hashed_password = $row["password"];
                              
                                   // Password is correct, so start a new session
                                   session_start();
                                   // Store data in session variables
                                   $_SESSION["loggedin"] = true;
                                   $_SESSION["id"] = $id;
                                   $_SESSION["username"] = $username;                            
                                   
                                   header("location: views/admin/index.php");
                           }
                       } else{
                           
                           $login_err = "Invalid username or password.";
                       }
                   // Close statement
                   unset($stmt);
               }
           
           
           // Close connection
           unset($pdo);
        
    }
}