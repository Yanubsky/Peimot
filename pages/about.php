<?php 
session_start()
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include '../style.php' ?>
</head>
<body>
    <?php include '../nav.php' ?>
    <main class="aboutMainDiv"></main>
    <h1>קצת עלי</h1>

    <?php 
    if (isset($_SESSION['email'])) {
        echo "<h4>משתמש מחובר</h4>";
    } else {
        echo "<h4> אינך מחובר</h4>";
    }   
    
    ?>

    <!-- <?php include '../footer.php'?> -->
    <?php include '../js-scripts.php'?>
    <script>
        changeNavbarCurrentPageColor('#about');

    </script>
</body>
</html>
