<?php 
$client = new Aws\S3\S3Client([/** options **/]);

    // Register the stream wrapper from an S3Client object
    $client->registerStreamWrapper();
?>