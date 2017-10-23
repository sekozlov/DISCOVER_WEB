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
                 'SaveAs' => '/tmp/discover.csv'
            ));
             //   echo $result['Body'];
                $data = array_map('str_getcsv', file('/tmp/discover.csv'));
                $i = rand(1,count($data)-1);
                $y = rand(1,count($data)-1);
                $x = rand(1,count($data)-1);
                $arr = array('song1'=>$data[$i][1],'song2'=>$data[$y][1],'song3'=>$data[$x][1],'id1'=>$i,'id2'=>$y,'id3'=>$x);
//printf("%s\n",$data[$i][1]);
echo $arr;
?>
