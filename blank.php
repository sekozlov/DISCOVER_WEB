<?php

include_once "test_session.php";
		
$hdata = $_SESSION['ARR']; 
    
echo json_encode($hdata);

?>
