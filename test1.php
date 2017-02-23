<?php

include_once "test_session.php";
$data = $_SESSION['ARR']; 
// echo "<pre>";
// print_r($_SESSION['ADD_ALBUM']);
// echo "</pre>";
if (count($_SESSION['ADD_ALBUM'])==0) return;
    $temp=0;
    for ($i=0;$i<count($_SESSION['ADD_ALBUM']);$i++){
        $key = $_SESSION['ADD_ALBUM'][$i][0];
        if ($_SESSION['ADDNOT'][$key]==1) {
             $temp=1;
            break;
        };
    };

    if ($temp==0) return;

    for ($i=0;$i<count($_SESSION['ADD_ALBUM']);$i++){
        $temp = $_SESSION['ADD_ALBUM'][$i][0];
        if($_SESSION['ADDNOT'][$temp]==1){
         $data[] = array(rand(),$_SESSION['ALBUM_INFO'][0][1],$_SESSION['ALBUM_INFO'][0][0],$_SESSION['ADD_ALBUM'][$i][1]);
      }
    }

sort($data);
function str_putcsv($input, $delimiter = ',', $enclosure = '"'){
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
             $datacsv = '';
        foreach ($data as $fields) {
        $datacsv .= str_putcsv($fields);
        };
        print_r($datacsv);
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
?>