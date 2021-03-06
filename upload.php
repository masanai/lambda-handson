<html>
<head><title>Lambdaハンズオン S3アップロード完了</title><head>
<body>
<?php
    require '/var/www/html/lambda-handson/vendor/autoload.php';
    use Aws\S3\S3Client;
    use Aws\S3\Exception\S3Exception;

    $bucket = $_POST['bucket'];
    $key = date("Ymdhis") . $bucket . '.csv';

    $s3 = new S3Client([
        'version' => 'latest',
        'region'  => 'ap-southeast-1'
    ]);

    try {
        // Upload data.
        $result = $s3->putObject([
            'Bucket' => $bucket,
            'Key'    => $key,
            'Body'   => file_get_contents($_FILES['f1']['tmp_name']),
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