 <div id="mainpic" align="center" style="margin-left: auto; margin-right: auto; margin-top: 10%;margin-bottom: 10%;">
                            <a class="open_window" href="test.php">
                                <img id="image" width="200" height="200" src="IMGS/gears.gif" >
                                </a>

                            </div>


<?php 
            ini_set('display_errors', 'On');
            $data = array_map('str_getcsv', file('discover.csv'));
           unset($data[$_COOKIE['discov_ind']]);
           sort($data);
             $datacsv = arrayToCsv($data);
//             $fp = fopen('discover.csv', 'w');
//             foreach ($data as $fields) {
//                  fputcsv($fp, $fields);
//              }
//              fclose($fp);

            ini_set('curl.cainfo', 'S3/cacert.pem');
            require_once('S3/Aws.phar');
            use Aws\S3\S3Client;
            use Aws\S3\Exception\S3Exception;


            $client = S3Client::factory(array(
                 'region'            => 'us-east-1',
    'version'           => '2006-03-01',
                 'credentials' => array(
                      'key'    => 'AKIAIT5EXYJMQFCDDSKQ',
                 'secret' => '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',

             )
            ));
            
            $result = $client->putObject(array(
    'Bucket'       => 'discover-song',
    'Key'          => 'discover.csv',
    'Body'          => $datacsv,             
    //'SourceFile'   => 'discover.csv'
));
            echo $result['Expiration'] . "\n";
echo $result['ServerSideEncryption'] . "\n";
echo $result['ETag'] . "\n";
echo $result['VersionId'] . "\n";
echo $result['RequestId'] . "\n";

            echo "<script>alert('Сделано =)');</script>";
           
            ?>

