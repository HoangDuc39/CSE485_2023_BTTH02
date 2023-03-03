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
  
}