<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>

<?php


if(isset($_SESSION['username'])){
    header("location: ");

}


if (isset($_POST['submit'])) {
    if (empty($_POST['email']) || empty($_POST['password'])) {
        echo "Not all fields are filled";
    } else {

//get data from database

$email=$_POST['email'];
$password=$_POST['password'];


$login=$conn->query("SELECT * FROM users WHERE email='$email'");
$login->execute();

$fetch=$login->fetch(PDO::FETCH_ASSOC);
if($login->rowCount() > 0){

    if(password_verify($password, $fetch['password'])){

        //Start session

      $_SESSION['username']=$fetch['username'];
      $_SESSION['email']=$fetch['email'];
        header("location:".APPURL."");
    }else{
        echo "<script>alert('email or password is wrong')</script>";
    }
}else{
    echo "<script>alert('email or password is wrong')</script>";
}

    }
}


?>
    <!-- Normal Breadcrumb Begin -->
    <section class="normal-breadcrumb set-bg" data-setbg="<?php echo APPURL?>/img/normal-breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="normal__breadcrumb__text">
                        <h2>Login</h2>
                        <p>Welcome to the official Anime blog.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Normal Breadcrumb End -->

    <!-- Login Section Begin -->
    <section class="login spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="login__form">
                        <h3>Login</h3>
                        <form action="login.php"method ="POST">
                            <div class="input__item">
                                <input name="email" type="text" placeholder="Email address">
                                <span class="icon_mail"></span>
                            </div>
                            <div class="input__item">
                                <input name="password"type="password" placeholder="Password">
                                <span class="icon_lock"></span>
                            </div>
                            <button type="submit" name="submit" class="site-btn">Login Now</button>
                        </form>
                        <a href="#" class="forget_pass">Forgot Your Password?</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="login__register">
                        <h3>Dont’t Have An Account?</h3>
                        <a href="signup.php" class="primary-btn">Register Now</a>
                    </div>
                </div>
            </div>
          
        </div>
    </section>
    <!-- Login Section End -->

    <?php require "../includes/footer.php"; ?>