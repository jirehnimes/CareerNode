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

	// $top5 = array("","","","","");

	// $top5school = array();

	// while($feedItem = odbc_fetch_array($res))
	// {
	// 	$d = getDistance($feeduser['lat'], $feedItem['lat'], $feeduser['long'], $feedItem['long']);
	// 	for ($x = 0; $x < sizeof($top5); $x++) {
	// 		if($top5[$x] == ""){
	// 			$top5[$x] = $feedItem['schoolname'];
	// 			break;
	// 		}else{
	// 			echo $feedItem['schoolname'] . "<br>";
	// 		}
	// 	} 
	// }

	// for ($x = 0; $x < sizeof($top5); $x++) {
	// 		echo $top5school[$x] . "<br>";
	// 	} 

	echo "	<link rel='stylesheet' type='text/css' href='css/stationlayout.css'>";
	    	// <script src='js/home.js'></script>

	while($feedItem = odbc_fetch_array($res))
	{
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
