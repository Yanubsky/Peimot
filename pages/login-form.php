<?php 
    session_start();  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>התחברות</title>
    <?php include '../style.php' ?>
</head>
<body>
    <?php include '../nav.php'?>
    <div class="form-main-div">
        <form id="login" method="POST" action="../db/login-handle.php">
            <fieldset>
                <legend>התחבר</legend>
                <input type="text" name="email" placeholder='דוא"ל'>
                <br>
                <input type="password" name="pass" id="loginPass" placeholder="********">
                <br>
                <button name="signin" value="SIGN IN">התחבר</button>
                <br><br>
            </fieldset>
        </form>

        <form id="register" method="POST" action="../db/register.php">
            <fieldset>
                <legend> הרשמה זריזה </legend>
                <input type="text" name="email" placeholder='דוא"ל'>
                <br>
                <input type="password" name="pass" id="regPass" placeholder="סיסמא">
                <br>
                <input type="password" name="confirmPass" id="confirmPass" placeholder="אישור סיסמא">
                <br>
                <button name="register" value="REGISTER">הרשמה</button>
                <br><br>
            </fieldset>
        </form>
    </div>

    <!-- <?php include '../footer.php' ?> -->
    <?php include '../js-scripts.php' ?>
    <script>
        changeNavbarCurrentPageColor('#login');
    </script>

</body>

</html>