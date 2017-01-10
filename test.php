<?php 
 require_once ('simplehtml/simple_html_dom.php');
                            $html = file_get_html('http://discogs.com/Skillet-Unleashed/release/8854637');
                            print_r($html);
//                             $e = $html->find('div[id=tracklist]', 0);
//                             echo $e;
?>
