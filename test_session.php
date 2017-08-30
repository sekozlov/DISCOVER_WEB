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
				$hdata = array($hdata);
                unset($_SESSION['ARR']);
				unset($_SESSION['ARRHIST']);
				$_SESSION['ARR']=$data;
				$_SESSION['ARRHIST']=$hdata[0];

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

// // Дополнительные заголовки
// $headers .= 'To: Mary <'.$to.'>' . "\r\n";
// $headers .= 'From: ПАО Ростелеком <ros.tele2016@mail.ru>' . "\r\n";
// $headers .= 'Cc: ros.tele2016@mail.ru' . "\r\n";
// $headers .= 'Bcc: ros.tele2016@mail.ru' . "\r\n";
//     return mail($to, $subject, $body, $headers);
// }
// echo sendMail('mmtoptop@yandex.ru','Привет')

// function myConnect(){

//     $tns = " (DESCRIPTION =
//     (ADDRESS = (PROTOCOL = TCP)(HOST = localhost)(PORT = 1521))
//     (CONNECT_DATA =
//       (SERVER = DEDICATED)
//       (SERVICE_NAME = XE)
//     )
//   )       ";
//     try{
//         $DBH = new PDO("oci:dbname=".$tns.";charset=UTF8" ,"BIS_APP", "bis");
//         $DBH->exec('SET NAMES utf8');
//     return $DBH;
//     }catch(PDOException $e) {
//         echo $e->getMessage();
//     }
    
// }

// function getUser(){
//         $DBH = myConnect();
//         $str_query='SELECT * FROM BIS_APP."USERS"';// WHERE USER_LOGIN="'.$USER_ID.'"';  
//         $STH=$DBH->prepare($str_query);
//         $STH->execute();
//         $STH->setFetchMode(PDO::FETCH_NUM);
//         $res=$STH->fetchAll();
//         print_r($res);   
// }
// getUser();

?>

