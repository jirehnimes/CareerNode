<?php
    
	require("database.php");
	// session_start();

	$email = "jjnimes@gmail.com";

	$sql = "SELECT university FROM useraccount WHERE email = '".$email."'";
    $res = odbc_exec($conn,$sql);

    $data = odbc_fetch_array($res);

    $a = $data['university'];

    if($a == NULL){
    	$status = "NULL";
    }else{
    	$status = "NOTNULL";
    }
    
?>