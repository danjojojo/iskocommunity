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
    <title>Join PUP Iskommunity</title>
    <link rel="stylesheet" href="assets/css/signup.css">
</head>
<body>
    <header>
        <a href="index.php"><img src="assets/images/Iskommunity_LogoName.png"></a>
        <p>Already have an account? <a href="login.php">Log in</a></p>
    </header>
    <form action="signup.php" method="post" autocomplete="off">
        <div class="intro">
            <p>Welcome to PUP Iskommunity!</p>
            <p>Let's get you started</p>
        </div>
        <!-- FORM VALIDATION -->
        <?php include(ROOT_PATH . '/app/helpers/formMessage.php')?>
        <!-- FORM VALIDATION -->
        <div class="input-box">
            <label for="email">Enter your webmail</label>
            <input type="email" name="stud_Webmail" id="email" value="<?php echo $email?>">
            <label for="username">Enter your username</label>
            <input type="text" name="stud_Username" id="username" value="<?php echo $username?>">
            <label for="password">Password</label>
            <input type="password" name="stud_Password" id="password" value="<?php echo $password?>">
            <label for="confirmpassword">Confirm your password</label>
            <input type="password" name="confirmpassword" id="confirmpassword" value="<?php echo $confirmpassword?>">
            <button class="btn" type="submit" name="register">All set!</button>
        </div>
    </form>
    <?php 
        include(ROOT_PATH . '/app/includes/footer.php');
    ?>
</body>
</html>