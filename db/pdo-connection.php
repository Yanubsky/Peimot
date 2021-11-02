<?php
require '../vendor/autoload.php';
use Aws\S3\S3Client;  
use Aws\Exception\AwsException;

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

$s3Client = new S3Client([
    'profile' => 'default',
    'region' => 'us-west-2',
    'version' => '2006-03-01'
]);

function createBucket($s3Client, $bucketName)
{
    try {
        $result = $s3Client->createBucket([
            'Bucket' => $bucketName,
        ]);
        return 'The bucket\'s location is: ' .
            $result['Location'] . '. ' .
            'The bucket\'s effective URI is: ' . 
            $result['@metadata']['effectiveUri'];
    } catch (AwsException $e) {
        return 'Error: ' . $e->getAwsErrorMessage();
    }
}

function createTheBucket()
{
    $s3Client = new S3Client([
        'profile' => 'default',
        'region' => 'us-east-2',
        'version' => '2006-03-01'
    ]);

    echo createBucket($s3Client, 'my-bucket');
}

// Uncomment the following line to run this code in an AWS account.
createTheBucket('peimot-new-buck');
?>