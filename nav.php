<?php include "vars.php"; ?>
<header class="header">
    <h1 class="logo"><a  href="./home.php"><?php echo $logo?></a></h1>
    <h4><?php echo $slogen ?></h4>
   
    <ul class="main-nav">
        <li><A id="about" href="./about.php"><?php echo $about?></A></li>
        <li><A id="therapies" href="./therapies.php"><?php echo $therapies?></A></li>
        <li><A id="articles" href="./articles.php"><?php echo $articles?></A></li>
        <li><A id="home" href="./home.php"><?php echo $home?></A></li>
        
        <li><span id="divider">|</span></li> <!-- i want to implement the divider better -->

        <?php 
            if (isset($_SESSION['email'])) {
                $user = $_SESSION['email'];
                $isAdmin = $_SESSION['isAdmin'];
                if ($isAdmin != 0) {
                    echo '<li><A id="logout" href="../db/do-logout.php" ><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSTtW2vS-RCiLjnd5cQozpAv70Rzv7SMJO84A&usqp=CAU"></A></li>';
                    echo "<li><A id='admin' href='./admin.php'>$user</A></li>"; // when the link is activated it logs the user out
                    // TODO: continue with admin interface
                } 
                else 
                {
                    echo '<li><A id="logout" href="../db/do-logout.php" ><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSTtW2vS-RCiLjnd5cQozpAv70Rzv7SMJO84A&usqp=CAU"></A></li>';
                    echo "<li><A id='profile' href='./profile.php'>$user</A></li>";
                }
            } 
            else 
            {
                echo "<li><A href='./login-form.php' id='login'>התחבר</A></li>";
            }
            

        //implementing with switch case ran into problems - can it be ?

            // $email = $_SESSION['email'];
            // $isAdmin = $_SESSION['isAdmin'];
            
            // switch($email) {
            //     case $email === true:
            //         echo "<li><A href='./do-logout.php' id='logout'>התנתק</A></li>";
            //     case $isAdmin === true:
            //         echo "<li><A id='admin' href='./admin.php'>$admin</A></li>";
            //         break;
            //     default:
            //         echo "<li><A href='./login-form.php' id='login'>התחבר</A></li>";
            // };       
        ?>
        

       
    </ul>

</header>