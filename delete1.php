
 <div id="mainpic" align="center" style="margin-left: auto; margin-right: auto; margin-top: 10%;margin-bottom: 10%;">
                            <a class="open_window" href="test.php">
                                <img id="image" width="200" height="200" src="IMGS/gears.gif" >
                                </a>

                            </div>


<?php 
// ini_set('display_errors', 'On');
function str_putcsv($input, $delimiter = ',', $enclosure = '"')
    {
        // Open a memory "file" for read/write...
        $fp = fopen('php://temp', 'r+');
        // ... write the $input array to the "file" using fputcsv()...
        fputcsv($fp, $input, $delimiter, $enclosure);
        // ... rewind the "file" so we can read what we just wrote...
        rewind($fp);
        // ... read the entire line into a variable...
        $data1 = fread($fp, 1048576);
        // ... close the "file"...
        fclose($fp);
        // ... and return the $data to the caller, with the trailing newline from fgets() removed.
        return rtrim($data1, '\n');
    }
 
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
           // $data = array_map('str_getcsv', file('discover.csv'));
                $result = $client->getObject(array(
                'Bucket'       => 'discover-song',
                 'Key'          => 'discover.csv',
                 'SaveAs' => '/tmp/discover.csv'
            ));
             //   echo $result['Body'];
                $data = array_map('str_getcsv', file('/tmp/discover.csv'));
           // $data = array_values(array($data));
           // echo gettype($result['Body']);
          //  print_r($data);
           unset($data[$_COOKIE['discov_ind1']]);
           sort($data);
             $datacsv = '';
        foreach ($data as $fields) {
       // print_r($fields);
        $datacsv .= str_putcsv($fields);
       // $datacsv.= '\n'; 
        }
//             $fp = fopen('discover.csv', 'w');
//             foreach ($data as $fields) {
//                  fputcsv($fp, $fields);
//              }
//              fclose($fp);
          
            
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
            echo "<script>
            window.open('result.php?al=2');
            alert('Сделано =)');
            document.location = 'test.php';</script>";
           
            ?>
