<html>
<head><title>Lambdaハンズオン S3アップロード完了</title><head>
<body>
<?php
    require '/path/to/vendor/autoload.php';
    use Aws\S3\S3Client;
    use Aws\S3\Exception\S3Exception;

    $bucket = $_POST["bucket"];
    $key = $_FILES['f1']['name'];

    $s3 = new S3Client([
        'version' => 'latest',
        'region'  => 'ap-southeast-1'
    ]);

    try {
        $fp = fopen(_FILES['f1']['tmp_name'],'rb');
        // Upload data.
        $result = $s3->putObject([
            'Bucket' => $bucket,
            'Key'    => $key,
            'Body'   => $fp,
        ]);
        // Print the URL to the object.
        echo $result['ObjectURL'] . PHP_EOL;
    } catch (S3Exception $e) {
        echo $e->getMessage() . PHP_EOL;
    } finally{
        fclose($fp);
    }
?>
</body>
</html>