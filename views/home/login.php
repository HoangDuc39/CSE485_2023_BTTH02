<?php 
session_start();
        
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: index.php?controller=home&action=admin");
    exit;
}
require_once 'views/includes/login.php';  
?>
    <main class="container mt-5 mb-5">
        <!-- <h3 class="text-center text-uppercase mb-3 text-primary">CẢM NHẬN VỀ BÀI HÁT</h3> -->
        <div class="d-flex justify-content-center h-100">
                <div class="card">
                    <div class="card-header">
                        <h3>Sign In</h3>
                        <div class="d-flex justify-content-end social_icon">
                            <span><i class="fab fa-facebook-square"></i></span>
                            <span><i class="fab fa-google-plus-square"></i></span>
                            <span><i class="fab fa-twitter-square"></i></span>
                        </div>
                    </div>
                    <?php 
        if(!empty($login_err)){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }        
        ?>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="txtUser"><i class="fas fa-user"></i></span>
                                <input type="text" name="username" class="form-control" placeholder="username" >
                            </div>

                            <div class="input-group mb-3">
                                <span class="input-group-text" id="txtPass"><i class="fas fa-key"></i></span>
                                <input type="text" name="password" class="form-control" placeholder="password" >
                            </div>
                            
                            <div class="row align-items-center remember">
                                <input type="checkbox">Remember Me
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Login" class="btn float-end login_btn">
                            </div>
                        </form>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-center ">
                            Don't have an account?<a href="#" class="text-warning text-decoration-none">Sign Up</a>
                        </div>
                        <div class="d-flex justify-content-center">
                            <a href="#" class="text-warning text-decoration-none">Forgot your password?</a>
                        </div>
                    </div>
                </div>

        </div>
    </main>
    <?php require_once 'views/includes/footer.php'; ?>