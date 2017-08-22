<?php

$text = $_COOKIE['discov_song'];
list($left,, $right) = imageftbbox(22, 0, 'Verdana.ttf', 'Hello World');
echo $left;
echo $right;
?>
