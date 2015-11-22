<?php

    $serverName='ASUS\SQLEXPRESS';
    $user='careernodedbadmin';
    $password='password';
    $database='CAREERNODE_DB';
    $connection_string="DRIVER={SQL Server};SERVER=$serverName;DATABASE=$database";

    // Connect to the data source and get a handle for that connection.
    $conn=odbc_connect($connection_string,$user,$password);
    if ($conn){
    }else{
        exit("Connection Failed:" . odbc_errormsg() );
    }

?>