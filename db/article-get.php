<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'pdo-connection.php';
    include '../helpers/helper-php-funcs.php';
    txtScan($_POST['chosen-article']);
}
?>