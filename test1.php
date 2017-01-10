<?php require_once ('simplehtml/simple_html_dom.php');
$doc = new DOMDocument();
$doc->loadHTMLFile('https://www.discogs.com/Skillet-Unleashed/release/8854637');
$elements = $doc->getElementsByTagName('table');
// echo $doc->saveHTML();
// if (!is_null($elements)) {
//   foreach ($elements as $element) {
//     echo "<br/>". $element->nodeName. ": ";

//     $nodes = $element->childNodes;
//     foreach ($nodes as $node) {
//       echo $node->nodeValue. "\n";
//     }
//   }
// }
$nodes = $elements[0]->childNodes;
foreach ($nodes as $node) {
       echo $node->nodeValue. "<br/>";
     }

?>
