<?php 
$data = array_map('str_getcsv', file('discover.csv'));
$i = rand(1,count($data)-1);
setcookie ("discov_ind", $i);
$n = rand(1,count($data)-1);
setcookie ("discov_ind1", $n);
$m = rand(1,count($data)-1);
setcookie ("discov_ind2", $m);
?>

