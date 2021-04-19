<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'pdo-connection.php';
    updateAbout();
}

function updateAbout() {

    global $con;
    if(isset($_POST['update-about'])) {
        
    }
}

?>