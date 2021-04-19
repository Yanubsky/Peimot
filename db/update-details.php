<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'pdo-connection.php';
    updateDetails();
}

function updateDetails(){
    global $con;
    if(isset($_POST['update'])){
        session_start();
        $oldPass = $_POST['oldPass'];
        $email = $_POST['email'];
        if($_SESSION['pass'] === $oldPass && $_SESSION['email'] === $email){
            $newPass = $_POST['pass'];
            $confirmNewPass = $_POST['confirmPass'];
            if($newPass === $confirmNewPass){   
                $id = $_SESSION['id'];
                $sqlStr = "UPDATE `users` SET 
                `pass` = :pass WHERE `id` = $id;";
                $updateQuery = $con->prepare($sqlStr);

                $updateQuery->bindParam(':pass', $newPass, PDO::PARAM_STR);
                $updateQuery->execute();
                    // Check that the query has been performed 
                    //      and that the database has been successfully updated.
                if ($updateQuery->rowCount() > 0) {
                    $_SESSION['pass'] = $newPass;
                    header("location:../pages/profile.php");
                } 
                else{
                    header("location: profile.php");
                }            
    
            }

        }
       
        
    }
}

?>