<?php

$text = $_COOKIE['discov_song'];
list($left,, $right) = imageftbbox(22, 0, 'Verdana.ttf', $text);
echo $left;
echo $right;
?>
