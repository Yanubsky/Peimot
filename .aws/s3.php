<?php 
    require ('../vendor/autoload.php');
    use Aws\S3\S3Client;  
    use Aws\Exception\AwsException;

    $s3 = new S3Client([
        'profile' => 'default',
        'version' => 'latest',
        'region'   => 'us-east-2'
    ]);  

    //Listing all S3 Bucket
    $buckets = $s3->listBuckets();
    foreach ($buckets['Buckets'] as $bucket) {
        echo $bucket['Name'] . "\n";
    }  
   
    
?>