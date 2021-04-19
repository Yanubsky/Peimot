<?php 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'pdo-connection.php';
    checkLoginInformation();
}

function checkLoginInformation() //watch lesson 33 for an explanation what every code line does 
{
    global $con;
    if (isset($_POST['signin'])) {
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $select = $con->prepare("SELECT * FROM users WHERE
                            email='$email' and pass='$pass'");
        $select->setFetchMode(PDO::FETCH_ASSOC);
        $select->execute();
        $data = $select->fetch(); 

        if ($select->rowCount() > 0) {
            session_start();
            
            $_SESSION['id'] = $data['id'];
            $_SESSION['email'] = $data['email'];
            $_SESSION['pass'] = $data['pass'];
            $_SESSION['name'] = $data['name']; 
            $_SESSION['isAdmin'] = $data['isAdmin']; //boolean

            header("location:/myphp/peimot/pages/home.php");
        } 
        else 
        {
            echo "<h1> שם משתמש ו/או סיסמא שגויים </h1>";
        }
    }
}
?>      