<?php

    require("database.php");

    $col1 = "asdasd";

    if(isset ($_POST['login'])){
        $email = $_POST['email'];
        $pwd = $_POST['pwd'];

        $sql="SELECT count(*) AS Total FROM useraccount WHERE email = '".$email."' AND password = '".$pwd."'";

        $res = odbc_exec($conn,$sql);

        while ($data = odbc_fetch_array($res)) {
            $total = $data['Total'];
        }

        if ($total == 1){
            echo    "<script>
                        alert('Access Granted!');
                        window.location.href='../home.php';
                    </script>";
        } else {
            echo    "<script>
                        alert('Access Denied. Incorrect Username or Password');
                        window.location.href='../index.php';
                    </script>";
        }

    }
        
?>