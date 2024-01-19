<?php 
include('path.php');
include(ROOT_PATH . '/app/controllers/users.php');

if(!empty($_SESSION["id"])){
    header("location: " . BASE_URL . '/index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in to PUP Iskommunity</title>
    <link rel="stylesheet" href="assets/css/login.css">
</head>
<body>
    <!-- NavBar -->
    <header>
        <a href="index.php"><img src="assets/images/Iskommunity_LogoName.png"></a>
        <p>Log in to PUP Iskommunity</p>
    </header>

    <!-- FORM VALIDATION -->
    <?php include(ROOT_PATH . '/app/helpers/formMessage.php')?>
    
    <!-- FORM VALIDATION -->
    <div class="login-box">
        <div class="input-box">
            <form action="" method="post" autocomplete="off">
                <label for="username">Username or email</label>
                <input type="text" name="username" id="username" value="<?php echo $usernameemail?>">    
                <label for="password">Password</label>
                <input type="password" name="password" id="password" value="<?php echo $password?>">
                <button class="btn" type="submit" name="login">Log in</button>
            </form>
        </div>
    </div>
    <div class="signup-page">
        <p>New to PUP Iskommunity? <a href="signup.php">Create account</a></p>
    </div>
    
    <?php 
        include(ROOT_PATH . '/app/includes/footer.php');
    ?>
</body>
</html>