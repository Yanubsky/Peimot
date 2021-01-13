<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'pdo-connection.php';
    createNewTable();
}
function createNewTable(){
    include 'login-handle.php';

    if (isset($_POST['register'])) {
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $confirmPass = $_POST['confirmPass'];
        $isAdmin = false;

        if ($pass === $confirmPass) {
            $createTable = $con->prepare(
                'CREATE TABLE IF NOT EXISTS users(
                id int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
                email varchar(60) NOT NULL,
                pass varchar(60)NOT NULL,
                isAdmin boolean NOT NULL,
                PRIMARY KEY (id)
                );'
            );
            $createTable->execute();

            $insertQuery = "INSERT INTO `users`
                    (`email`, `pass`, `isAdmin`)
                VALUES
                    (:email,:pass,:isAdmin)";

            $query = $con->prepare($insertQuery);
            $query->bindparam(':email', $email);
            $query->bindparam(':pass', $pass);
            $query->bindparam(':isAdmin', $isAdmin);
            $query->execute();

            $lastInsertId = $con->lastInsertId();
            if ($lastInsertId > 0) {
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
                    echo "<h1>אירעה שגיאה</h1>";
                }
            } 
            else 
            {
                echo "<script>passConfirm($pass,$confirmPass)</script>";
            }
        }
    }
}
?>