<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>הפרופיל שלי</title>
    <?php include '../style.php';?>
</head>
<body>
    <?php include '../nav.php' ?>
    <div id="userDetails">
        <?php echo print_r($_SESSION); ?>
    </div>
    <div class="form-main-div">
        <form id="update" method="POST" action="../db/update-details.php">
            <fieldset>
                <legend> עדכון פרטים </legend>
                <input type="text" name="email" placeholder='שם משתמש'>
                <br>
                <input type="password" name="pass" id="regPass" placeholder="החלף סיסמא">
                <br>
                <input type="password" name="confirmPass" id="confirmPass" placeholder="אישור סיסמא">
                <br>
                <input type="password" name="oldPass" id="oldPass" placeholder="סיסמא קודמת">

                <br>
                <button name="update" value="UPDATE">עדכון</button>
                <br><br>
            </fieldset>
         </form>
    </div>
    <!-- <?php include '../footer.php' ?> -->
    <?php include '../js-scripts.php'?>
    <script>
        changeNavbarCurrentPageColor('#profile');
    </script>
</body>
</html>