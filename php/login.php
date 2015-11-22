<?php

    require("database.php");
    
    session_start(); // Starting Session
    $error=''; // Variable To Store Error Message
    if (isset($_POST['login'])) {
        if (empty($_POST['email']) || empty($_POST['pwd'])) {
            $error = "Username or Password is invalid";
        }
        else
        {
            // Define $username and $password
            $email=$_POST['email'];
            $pwd=$_POST['pwd'];
            // SQL query to fetch information of registerd users and finds user match.
            $sql="SELECT count(*) AS Total FROM useraccount WHERE email = '".$email."' AND password = '".$pwd."'";
            $res = odbc_exec($conn,$sql);
            while ($data = odbc_fetch_array($res)) {
                $total = $data['Total'];
            }
            if ($total == 1) {
                $_SESSION['login_user']=$email; // Initializing Session
                echo    "<script>
                            alert('Access Granted!');
                            window.location.href='php/session.php';
                        </script>";
            } else {
                echo    "<script>
                            alert('Access Denied. Incorrect Username or Password');
                            window.location.href='index.php';
                        </script>";
            }

        }
    }

?>