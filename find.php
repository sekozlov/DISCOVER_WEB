<?php 
session_start();
if ($_POST["Test"]) {
    require_once ('simplehtml/simple_html_dom.php');
    $url = 'https://www.discogs.com/search/?q='.str_replace(' ',"+",$_POST["newartist"]).'+-'.str_replace(' ',"+",$_POST["newalbum"]).'&type=all';
    $doc = new DOMDocument();
    $doc->loadHTMLFile($url);
    $elements = $doc->getElementsByTagName('h4');
    $nodes = $elements[0]->childNodes;
    $url1 = $nodes[0]->getAttribute('href');
    
    $doc = new DOMDocument();
    $doc->loadHTMLFile('https://www.discogs.com'.$url1);
    $elements = $doc->getElementsByTagName('table');
    $nodes = $elements[0]->childNodes;
    $i = 1;
    foreach ($nodes as $node) {
            $arrFilter[] = array($i,explode("\n",substr($node->nodeValue , 0,75))[0]);
            $i = $i+1;
        }
    unset($_SESSION['ADD_ALBUM']);
    $album_info[] = array($_POST["newartist"],trim($_POST["newalbum"]));
    $_SESSION['ADD_ALBUM']=$arrFilter;
    $_SESSION['ALBUM_INFO']=$album_info;
    unset($_SESSION['ADDNOT']);
    for ($i=0;$i<count($_SESSION['ADD_ALBUM']);$i++){
        $key_account=$_SESSION['ADD_ALBUM'][$i][0];
        $_SESSION['ADDNOT'][$key_account]=1;
    }
    
    echo json_encode($arrFilter);
}

    // $url = 'https://www.discogs.com/search/?q='.str_replace(' ',"+",'linkin park').'+-+'.str_replace(' ',"+",'meteora').'&type=all';
    // $doc = new DOMDocument();
    // $doc->loadHTMLFile($url);
    // $elements = $doc->getElementsByTagName('h4');
    // $nodes = $elements[0]->childNodes;
    // $url1 = $nodes[0]->getAttribute('href');
    
    // $doc = new DOMDocument();
    // $doc->loadHTMLFile('https://www.discogs.com'.$url1);
    // $elements = $doc->getElementsByTagName('table');
    // $nodes = $elements[0]->childNodes;
    // foreach ($nodes as $node) {
    //         $arrFilter[] = substr($node->nodeValue , 0,75);
    //     }
    //     echo json_encode($arrFilter);
if ($_POST["addnot_key"]) {
    $_SESSION['ADDNOT'][$_POST["addnot_key"]]=$_POST["addnot_value"];
}
function microtime_float(){
    list($usec, $sec) = explode(" ", microtime());
    return ((float)$usec + (float)$sec);
}
function SendMailAll(){    
    if (count($_SESSION['ADD_ALBUM'])==0) return;
    $temp=0;
    for ($i=0;$i<count($_SESSION['ADD_ALBUM']);$i++){
        $key = $_SESSION['ADD_ALBUM'][$i][0];
        if ($_SESSION['ADDNOT'][$key]==1) {
             $temp=1;
            break;
        } 
    }
    if ($temp==0) return;
    
    for ($i=0;$i<count($_SESSION['ADD_ALBUM']);$i++){
        $temp = $_SESSION['ADD_ALBUM'][$i][0];
        if($_SESSION['ADDNOT'][$temp]==1){
         $data[] = array(microtime_float(),$_SESSION['ALBUM_INFO'][1],$_SESSION['ALBUM_INFO'][0],$_SESSION['ADD_ALBUM'][$i][1]);
      }
    }
sort($data);
             $datacsv = '';
        foreach ($data as $fields) {
        $datacsv .= str_putcsv($fields);
        }      
            $result = $client->putObject(array(
    'Bucket'       => 'discover-song',
    'Key'          => 'test.csv',
    'Body'          => $datacsv,             
    //'SourceFile'   => 'discover.csv'
));
}

if ($_POST["addnot_key"]=='true') {
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
                
}

?>

