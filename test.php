<?php 
 require_once ('simplehtml/simple_html_dom.php');
                            $html = file_get_html('http://www.discogs.com');
                            print_r($html);
//                             $e = $html->find('div[id=tracklist]', 0);
//                             echo $e;
?>
