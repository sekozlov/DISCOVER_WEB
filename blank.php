<?php

include_once "test_session.php";
		
$hdata = $_SESSION['ARRHIST']; 
    
echo json_encode($hdata);

?>
