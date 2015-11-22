<?php
     
    require("database.php");
    // session_start();

    try {
     
        $sql = "SELECT * FROM schools";

        $res = odbc_exec($conn,$sql);

        $data = array();

        while($myRow = odbc_fetch_array( $res )){ 
            $data[] = $myRow;
        }
        
        echo json_encode( $data ); 

    } catch (Exception $e) {
        echo $e->getMessage();
    }

?>