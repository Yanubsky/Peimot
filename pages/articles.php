<?php 
session_start();
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
    <div class="itemsMainDiv">
        <h1>Items</h1>

        <?php 
        if (isset($_SESSION['email'])) {
            echo "<h4>משתמש מחובר</h4>";
        } else {
            echo "<h4> אינך מחובר</h4>";
        }
        ?>

        <?php include '../arrays/articles-array.php' ?>
        <div id="articles" style='display:flex; flex-wrap:wrap; justify-content:center;'>
            <?php 
            for ($i = 0; $i < count($myArticlesArr); $i++) {
                echo "<div><img src='$myArticlesArr[$i]' width='300px' height='200px' alt='free soul'/></div>";
            }
            ?>  
        </div>

    </div>

    <!-- <?php include '../footer.php'?> -->
    <?php include '../js-scripts.php'?>
        <script>
        changeNavbarCurrentPageColor('#articles');
    </script>
</body>

</html>

