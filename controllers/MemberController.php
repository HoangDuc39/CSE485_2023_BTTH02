<?php
include("services/MemberService.php");

class MemberController{
    
    // Hàm xử lý hành động index
    public function index(){
        // Nhiệm vụ 1: Tương tác với Services/Models
        $memberService = new MemberService();
        $articles = $memberService->getAllAuthor();
        // Nhiệm vụ 2: Tương tác với View
        include("views/author/author.php");
    }
    public function login() {
       if($_SERVER["REQUEST_METHOD"] == "POST"){
            $username = trim($_POST["username"]);
            $password = trim($_POST["password"]);
            $memberService = new MemberService();
            $article = $memberService->getAccount($username,$password);
        }
    
       
        include("views/home/login.php");
    }
    public function logout(){
         include("views/admin/logout.php");
     }
}