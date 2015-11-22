<?php 
	require("database.php");
	
	session_start();

	$user_check=$_SESSION['login_user'];

	$sql = "SELECT * FROM schools";

	$usersql = "SELECT lat, long FROM useraccount WHERE email = '".$user_check."'";

	$res = odbc_exec($conn,$sql);

	$userres = odbc_exec($conn,$usersql);

	$feeduser = odbc_fetch_array($userres);

	//Haversine Function
	function getDistance($lat1, $lat2, $long1, $long2) {
	  $R = 6378137; // Earth’s mean radius in meter
	  $dLat = abs($lat2 - $lat1);
	  $dLong = abs($long2 - $long1);
	  $a = sin($dLat / 2) * sin($dLat / 2) +
	    cos($lat1) * cos($lat2) *
	    sin($dLong / 2) * sin($dLong / 2);
	  $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
	  $d = $R * $c;
	  return $d; // returns the distance in meter
	};

	$shortestdist = 0;
	$shortestlat = 0;
	$shortestlong = 0;
	while ($data = odbc_fetch_array($res)) {
        $dist = getDistance($feeduser['lat'],$data['lat'],$feeduser['long'],$data['long']);
        if ($shortestdist ==  0){
        	$shortestdist = $dist;
        	$shortestlat = $data['lat'];
        	$shortestlong = $data['long'];
        }elseif($shortestdist >  $dist){
        	$shortestdist = $dist;
        	$shortestlat = $data['lat'];
        	$shortestlong = $data['long'];
        }else{}
    }

    $sql="SELECT * FROM schools WHERE lat = ".$shortestlat." and long = ".$shortestlong;
	$resschool = odbc_exec($conn,$sql);
	echo "	<link rel='stylesheet' type='text/css' href='css/stationlayout.css'>";
	while ($feedItem = odbc_fetch_array($resschool)) {
        echo "
	    	<form method='post' class='form' role='form'>
		    	<div class='feedItem'>
		    		<img class='schoollogo' src='images/schools/" . $feedItem['schoolabv'] . ".png' />
		    		<div class='title'>" . $feedItem['schoolname'] . "</div>
					<div class='title'>" . $feedItem['city'] . "</div>
					<div class='buttons'>
						<button type='submit' class='buttonsel btn btn-success' name='accept' value='accept'>Accept</button>
						<button type='submit' class='buttonsel btn btn-danger' name='decline' value='decline'>Decline</button>
					</div>
				</div>
			</form>
    		";
    }

?>
