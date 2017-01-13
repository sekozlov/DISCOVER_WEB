<?php 
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
                 'SaveAs' => '/tmp/discover1.csv'
            ));
             //   echo $result['Body'];
                $data = array_map('str_getcsv', file('/tmp/discover1.csv'));
//$data = array_map('str_getcsv', file('discover.csv'));
print_r($data);
$i = rand(1,count($data)-1);
setcookie ("discov_ind", $i);
$n = rand(1,count($data)-1);
setcookie ("discov_ind1", $n);
$m = rand(1,count($data)-1);
setcookie ("discov_ind2", $m);
?>

