<?php
try {
    $dbhost = 'localhost:3307';
    $dbname = 'lior'; 
    $dbuser = 'yaniv'; 
    $dbpass = 'Clinton55'; 
    $con = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    echo "Error : " . $e->getMessage() . "<br/>";
    die();
}

?>

<?php
//Get Heroku ClearDB connection information
// $url = parse_url(getenv("CLEARDB_DATABASE_URL"));

// $server = $url["host"];
// $username = $url["user"];
// $password = $url["pass"];
// $db = substr($url["path"], 1);

// $con = new mysqli($server, $username, $password, $db);
?>