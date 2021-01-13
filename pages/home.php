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
<body class="homeBody">
    <?php
     include '../nav.php';
     include '../vars.php';
    ?>
    
    <main class="wrapper mainDivHome">
    <section class="section static">
            <h1><?php echo $welcome ?></h1>
        </section>
        <section class="section parallax bg1">
            <h1>תזונה</h1>
        </section>
        <section class="section static">
            <h1><?php echo $nutri ?></h1>
        </section>
       
        <section class="section parallax bg2">
            <h1>נשימה</h1>
        </section>
        <section class="section static">
            <h1><?php echo $breath?></h1>
        </section>
       
        <section class="section parallax bg3">
            <h1>שינה</h1>
        </section>
        <section class="section static">
        <h1><?php echo $sleep?></h1>
        </section>

        <section class="section parallax bg4">
            <h1>מודעות</h1>
        </section>
        <section class="section static">
        <h1><?php echo $aware?></h1>
        </section>

        <section class="section parallax bg5">
            <h1>תנועה</h1>
        </section>
        <section class="section static">
        <h1><?php echo $motion?></h1>
        </section>
        </main>
        <!-- <?php include '../footer.php' ?> -->
        <?php  include '../js-scripts.php'?>
        <script>
            changeNavbarCurrentPageColor('#home');
        </script>
</body>
</html>

