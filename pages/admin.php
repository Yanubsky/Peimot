<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>שולחן העריכה שלי</title>
    <?php include '../style.php' ?>
</head>
<body class="form-body">
    <?php 
        include '../nav.php';
        include '../vars.php';
        include '../js-scripts.php';
    ?>
    <div class="adminHeader">
        <h2>מנהל יקר</h2><br>
        <h2>דף זה משמש לעריכת המידע באתר, אנא השתמש בו בזהירות רבה</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> <!-- why did i have to do this?-->
            <button id="about" type="submit" name="choise" value="about"><?php echo $about?></button>
            <button id="users" type="submit" name="choise" value="users"><?php echo $users?></button>       
            <button id="therapies" type="submit" name="choise" value="therapies"><?php echo $therapies?></button>
            <button id="articles" type="submit" name="choise" value="articles"><?php echo $articles?></button>
            <button id="update" type="submit" name="choise" value="update">עדכון פרטים</button>
        </form>
    </div>

<div id="admin-choise">
    <?php 
        if(isset($_POST['choise'])){
            switch ($_POST["choise"]) {
                case 'update':
                   include '../admin-components/update-details-admin.php';
                   echo '<script> changeAdminCurrentComponentColor(`div.adminHeader button#update`) </script>';
                   break;
                case 'articles':
                   include '../admin-components/update-articles.php';
                   echo '<script> changeAdminCurrentComponentColor(`div.adminHeader button#articles`) </script>';
                   break;
                case 'therapies':
                   include '../admin-components/update-therapies.php';
                   echo '<script> changeAdminCurrentComponentColor(`div.adminHeader button#therapies`) </script>';
                   break;
                case 'users':
                   include '../admin-components/update-users.php';
                   echo '<script> changeAdminCurrentComponentColor(`div.adminHeader button#users`) </script>';
                   break;
                case 'about':
                   include '../admin-components/update-about.php';
                   echo '<script> changeAdminCurrentComponentColor(`div.adminHeader button#about`) </script>';
                   break;
            }       
        }
    ?>

</div>

<!-- <?php include '../footer.php'?> -->


<script>
    changeNavbarCurrentPageColor('#admin');
</script>

</body>
</html>



<div class="admin">

</div>


