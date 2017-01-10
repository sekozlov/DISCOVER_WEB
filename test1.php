<?php require_once ('simplehtml/simple_html_dom.php');
$html=file_get_contents('https://www.discogs.com/Skillet-Unleashed/release/8854637'); 
$html = str_get_html($html);
$e = $html->find('div[id=tracklist]', 0);
// preg_match("/<div.*id=\"tracklist\".*>*<\/div>/",$html[0],$match);
// print_r($html);
echo $e;
?>
