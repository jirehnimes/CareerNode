<?php
    
	require("database.php");

	if(isset ($_POST['signup'])){
        $email = $_POST['signupemail'];
        $pwd = $_POST['signuppassword'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $gender = $_POST['gender'];
        $months = $_POST['months'];
        $days = $_POST['days'];
        $years = $_POST['years'];
        $address = $_POST['address'];

        $sql="SELECT count(*) AS Total FROM useraccount WHERE email = '".$email."'";

        $res = odbc_exec($conn,$sql);

        while ($data = odbc_fetch_array($res)) {
            $total = $data['Total'];
        }

        if ($total == 1){
            echo    "<script>
                        alert('Email already used');
                        window.location.href='../index.php';
                    </script>";
        } else {
            $sql="INSERT INTO useraccount VALUES ('".$email."','".$pwd."','".$firstname."','".$lastname."','".$gender."',
			'".$years."-".$months."-".$days."','".$address."',NULL)";
        	odbc_exec($conn,$sql);
        	echo    "<script>
                        alert('Registered Successfully!');
                        window.location.href='../index.php';
                    </script>";
        }

    }
    
?>