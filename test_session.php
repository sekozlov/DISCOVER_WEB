<?php
session_start();

 
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
				$result = $client->getObject(array(
                'Bucket'       => 'discover-song',
                 'Key'          => 'hist.csv',
                 'SaveAs' => '/tmp/hist.csv'
            ));
             //   echo $result['Body'];
                $data = array_map('str_getcsv', file('/tmp/discover.csv'));
				$hdata = array_map('str_getcsv', file('/tmp/hist.csv'));
                unset($_SESSION['ARR']);
				unset($_SESSION['ARRHIST']);
				$_SESSION['ARR']=$data;
				$_SESSION['ARRHIST']=$hdata;

// $arrFilter=SuperFilter();
// unset($_SESSION['MAIL']);
// $_SESSION['MAIL']=$arrFilter;


// echo "<pre>";
// print_r($_SESSION['ADD_ALBUM']);
// echo "</pre>";

// function sendMail($to,$message){

//     $from = "ros.tele2016@mail.ru";
//     $subject = "Уважаемый клиент!";

//     //$body = "--$boundary\n";

//     //$body .= "Content-type: text/html; charset='utf8'\n";
//     // $body .= "Content-Transfer-Encoding: quoted-printablenn";
//     //$body .= "--$boundary\n";

//     $body = '<html>'. "\n";
//     $body .= '<head> <title></title>'. "\n";
//     $body .= '</head>'. "\n";
//     $body .= '<body>'. "\n";
//     $body .= $message. "\n";    
//     //$body .= chunk_split(base64_encode($message))."\n";
//     //$body .= "--".$boundary ."--\n";
//     $body .= '</body>'. "\n";
//     $body .= '</html>'. "\n";
//     $headers  = 'MIME-Version: 1.0' . "\r\n";
// $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";


?>

