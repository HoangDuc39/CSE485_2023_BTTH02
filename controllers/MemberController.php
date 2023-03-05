<?php
include("services/MemberService.php");

class MemberController{
    
    
    public function account(){
        // Nhiệm vụ 1: Tương tác với Services/Models
        $memberService = new MemberService();
        $accounts = $memberService->getAllAccount();
        // Nhiệm vụ 2: Tương tác với View
        include("views/member/account.php");
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
     public function add(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $username = trim($_POST["username"]);
            $password = trim($_POST["password"]);
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $accountService = new MemberService();
            $accounts = $accountService->AddAccount($username,$hashed_password);
            header("location: index.php?controller=member&action=account");
        }        

        include("views/member/add_account.php");
    }
}