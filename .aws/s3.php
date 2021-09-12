<?php 
    require ('../vendor/autoload.php');
    use Aws\S3\S3Client;  
    use Aws\Exception\AwsException;   

    $credentials = new Aws\Credentials\Credentials('key', 'secret');

    $s3 = new Aws\S3\S3Client([
        'version'     => 'latest',
        'region'      => 'us-east-2',
        'credentials' => $credentials
    ]);
    //==============================================================================================
//Listing all S3 Bucket
$buckets = $s3->listBuckets();
foreach ($buckets['Buckets'] as $bucket) {
    echo $bucket['Name'] . "\n";
}

?>