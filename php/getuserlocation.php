<?php
     
    require("database.php");
    // session_start();

    $email = "jjnimes@gmail.com";

    try {
     
        $sql = "SELECT lat, long FROM useraccount WHERE email = '".$email."'";

        $res = odbc_exec($conn,$sql);

        $location = array();

        while($myRow = odbc_fetch_array( $res )){ 
            $location[] = $myRow;
        }
        
        echo json_encode( $location ); 

    } catch (Exception $e) {
        echo $e->getMessage();
    }

?>