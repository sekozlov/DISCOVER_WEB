<?php 
// ini_set('display_errors', 'On');
session_start();
if ($_POST["Test"]) {
    require_once ('simplehtml/simple_html_dom.php');
    $url = 'https://www.discogs.com/search/?q='.str_replace(' ',"+",$_POST["newartist"]).'+-+'.str_replace(' ',"+",$_POST["newalbum"]).'&type=all';
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
            if (strlen(trim(explode(" \n",substr($node->nodeValue , 0,75))[0]))<3 or is_numeric(explode("-",explode(" \n",substr($node->nodeValue , 0,75))[0])[0])==1){
            $arrFilter[] = array($i,explode(" \n",substr($node->nodeValue , 0,75))[2]);
            $i = $i+1;
        }
        else{
            $arrFilter[] = array($i,explode(" \n",substr($node->nodeValue , 0,75))[0]);
            $i = $i+1;
        }
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
};

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
};


if ($_POST["add_album"]) {
include_once "test1.php";
//SendMailAll();
}
?>

