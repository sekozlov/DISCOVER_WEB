 <?php
                            include_once 'data.php';
ini_set('display_errors', 'On');
                            setcookie ("discov_album", $data[$i][1]);
                            echo $data[$i][1];
                            setcookie ("discov_artist", $data[$i][2]);
                            setcookie ("discov_song", $data[$i][3]);
                            $data2 = str_replace('&',"%26",$data[$i][2]);
                            $data1 = str_replace('&',"%26",$data[$i][1]);
                            $url = 'https://www.discogs.com/search/?q='.str_replace(' ',"+",$data2).'+-+'.str_replace(' ',"+",$data1).'&type=all';
                            $doc = new DOMDocument();
                            $doc->loadHTMLFile($url);
                            $elements = $doc->getElementsByTagName('h4');
                            $nodes = $elements[0]->childNodes;
                            $url1 = $nodes[0]->getAttribute('href');
                            //echo $url1;

                            $img_name = 'IMGS/'.str_replace(' ',"+",$data[$i][2]).'+-+'.str_replace(' ',"+",$data[$i][1]).'+album+cover.jpg';
                            if (file_exists($img_name)) {
                                $img_name = $img_name;
                            } else {
                                if (file_exists('IMGS/'.str_replace(' ',"+",$data[$i][2]).'+-+'.str_replace(' ',"+",$data[$i][1]).'+album+cover.jpeg')) {
                                    $img_name = 'IMGS/'.str_replace(' ',"+",$data[$i][2]).'+-+'.str_replace(' ',"+",$data[$i][1]).'+album+cover.jpeg';
                                } else {
                                    if (file_exists('IMGS/'.str_replace(' ',"+",$data[$i][2]).'+-+'.str_replace(' ',"+",$data[$i][1]).'+album+cover.png')) {
                                    $img_name = 'IMGS/'.str_replace(' ',"+",$data[$i][2]).'+-+'.str_replace(' ',"+",$data[$i][1]).'+album+cover.png';
                                } else {
                                    $img_name = 'IMGS/noalbum.jpg';
                                }
                                }
                            }
                            if (file_exists($img_name)) {
                                $img_name = $img_name;
                            } else {
                                $img_name = 'IMGS/noalbum.jpg';
                            }
                            setcookie ("img_name", $img_name);
                            ?>
 <?php
                            setcookie ("discov_album1", $data[$n][1]);
                            setcookie ("discov_artist1", $data[$n][2]);
                            setcookie ("discov_song1", $data[$n][3]);
                            $data2 = str_replace('&',"%26",$data[$n][2]);
                            $data1 = str_replace('&',"%26",$data[$n][1]);
                            $url = 'https://www.discogs.com/search/?q='.str_replace(' ',"+",$data2).'+-+'.str_replace(' ',"+",$data1).'&type=all';
                            $doc = new DOMDocument();
                            $doc->loadHTMLFile($url);
                            $elements = $doc->getElementsByTagName('h4');
                            $nodes = $elements[0]->childNodes;
                            $url1 = $nodes[0]->getAttribute('href');
                            //echo $url1;

                            $img_name = 'IMGS/'.str_replace(' ',"+",$data[$n][2]).'+-+'.str_replace(' ',"+",$data[$n][1]).'+album+cover.jpg';
                            if (file_exists($img_name)) {
                                $img_name = $img_name;
                            } else {
                                if (file_exists('IMGS/'.str_replace(' ',"+",$data[$n][2]).'+-+'.str_replace(' ',"+",$data[$n][1]).'+album+cover.jpeg')) {
                                    $img_name = 'IMGS/'.str_replace(' ',"+",$data[$n][2]).'+-+'.str_replace(' ',"+",$data[$n][1]).'+album+cover.jpeg';
                                } else {
                                    if (file_exists('IMGS/'.str_replace(' ',"+",$data[$n][2]).'+-+'.str_replace(' ',"+",$data[$n][1]).'+album+cover.png')) {
                                    $img_name = 'IMGS/'.str_replace(' ',"+",$data[$n][2]).'+-+'.str_replace(' ',"+",$data[$n][1]).'+album+cover.png';
                                } else {
                                    $img_name = 'IMGS/noalbum.jpg';
                                }
                                }
                            }
                            if (file_exists($img_name)) {
                                $img_name = $img_name;
                            } else {
                                $img_name = 'IMGS/noalbum.jpg';
                            }
                            setcookie ("img_name1", $img_name);
                            ?>
 <?php
                            setcookie ("discov_album2", $data[$m][1]);
                            setcookie ("discov_artist2", $data[$m][2]);
                            setcookie ("discov_song2", $data[$m][3]);
                            $data2 = str_replace('&',"%26",$data[$m][2]);
                            $data1 = str_replace('&',"%26",$data[$m][1]);
                            $url = 'https://www.discogs.com/search/?q='.str_replace(' ',"+",$data2).'+-+'.str_replace(' ',"+",$data1).'&type=all';
                            $doc = new DOMDocument();
                            $doc->loadHTMLFile($url);
                            $elements = $doc->getElementsByTagName('h4');
                            $nodes = $elements[0]->childNodes;
                            $url1 = $nodes[0]->getAttribute('href');
                            //echo $url1;

                            $img_name = 'IMGS/'.str_replace(' ',"+",$data[$m][2]).'+-+'.str_replace(' ',"+",$data[$m][1]).'+album+cover.jpg';
                            if (file_exists($img_name)) {
                                $img_name = $img_name;
                            } else {
                                if (file_exists('IMGS/'.str_replace(' ',"+",$data[$m][2]).'+-+'.str_replace(' ',"+",$data[$m][1]).'+album+cover.jpeg')) {
                                    $img_name = 'IMGS/'.str_replace(' ',"+",$data[$m][2]).'+-+'.str_replace(' ',"+",$data[$m][1]).'+album+cover.jpeg';
                                } else {
                                    if (file_exists('IMGS/'.str_replace(' ',"+",$data[$m][2]).'+-+'.str_replace(' ',"+",$data[$m][1]).'+album+cover.png')) {
                                    $img_name = 'IMGS/'.str_replace(' ',"+",$data[$m][2]).'+-+'.str_replace(' ',"+",$data[$m][1]).'+album+cover.png';
                                } else {
                                    $img_name = 'IMGS/noalbum.jpg';
                                }
                                }
                            }
                            if (file_exists($img_name)) {
                                $img_name = $img_name;
                            } else {
                                $img_name = 'IMGS/noalbum.jpg';
                            }
                            setcookie ("img_name2", $img_name);
                            ?>
<?php
// function arrayToCsv( array &$fields, $delimiter = ';', $enclosure = '"', $encloseAll = false, $nullToMysqlNull = false ) {
//     $delimiter_esc = preg_quote($delimiter, '/');
//     $enclosure_esc = preg_quote($enclosure, '/');

//     $output = array();
//     foreach ( $fields as $field ) {
//         if ($field === null && $nullToMysqlNull) {
//             $output[] = 'NULL';
//             continue;
//         }

//         // Enclose fields containing $delimiter, $enclosure or whitespace
//         if ( $encloseAll || preg_match( "/(?:${delimiter_esc}|${enclosure_esc}|\s)/", $field ) ) {
//             $output[] = $enclosure . str_replace($enclosure, $enclosure . $enclosure, $field) . $enclosure;
//         }
//         else {
//             $output[] = $field;
//         }
//     }

//     return implode( $delimiter, $output );
// }
?>
