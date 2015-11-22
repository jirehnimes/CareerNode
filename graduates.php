<?php
		$serverName='ASUS\SQLEXPRESS';
    $user='careernodedbadmin';
    $pass='password';
    $database='Career_Nodedb';
		
		
		$connection_string = "DRIVER={SQL Server};SERVER=$serverName;DATABASE=$database";
		$conn = odbc_connect($connection_string, $user, $pass);
			if($conn) {	
			}else {
				echo "Connection failed.";
			}

			if(isset ($_POST['search'])){
			$years1 = array();
			$years2= array();
			$years3= array();
			$years4 = array();
			$years5= array();
			$years6= array();
			$discipline= array();
			$value = array();
			$counter = 0;
			$yeargrad = $_POST['yeargrad'];

			if($yeargrad == 1)
					$schoolYear = "2005-2006";	
			else if($yeargrad == 2)
					$schoolYear = "2006-2007";	
			else if($yeargrad == 3)
					$schoolYear = "2007-2008";
			else if($yeargrad == 4)
					$schoolYear = "2008-2009";	
			else if($yeargrad == 5)
					$schoolYear = "2009-2010";	
			else 
					$schoolYear = "2010-2011";				

					$query = "select * from Grad_Dicipline_Group";
				 	$result = odbc_exec($conn,$query);
				 	while($out = odbc_fetch_array($result)){
				 			$years1[$counter] = $out['yr_2005_2006'];
							$years2[$counter] = $out['yr_2006_2007'];
							$years3[$counter] = $out['yr_2007_2008'];
							$years4 [$counter] = $out['yr_2008_2009'];
							$years5[$counter] = $out['yr_2009_2010'];
							$years6[$counter] = $out['yr_2010_2011'];
							$discipline[$counter] = $out['discipline_group'];
							$counter++;
				 	}
		}else{
							$years = [0,0,0,0];
				 			$passer= [0,0,0,0];
				 			$taker = [0,0,0,0];
				 			$percent_passing = [0,0,0,0];
				 			$schoolYear = "";

		}

?>


<!doctype html>
<html>
	<head>
		<title>Doughnut Chart</title>
		<script src="Chart.js-master/Chart.js"></script>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="bootstrap/bootstrap-3.3.5/bootstrap-3.3.5/docs/dist/css/bootstrap.min.css">
		<script src="bootstrap/bootstrap-3.3.5/bootstrap-3.3.5/js/tests/vendor/jquery.min.js"></script>
		<script src="bootstrap/bootstrap-sass-3.3.5/bootstrap-sass-3.3.5/assets/javascripts/bootstrap.min.js"></script>

		<link rel="stylesheet" type="text/css" href="CSS/chart_style.css">
		<style>
			body{
				padding: 1%;
				margin: 1%;
			}
			#canvas-holder{
				width:30%;
			}
		</style>
			</head>
			<body>
				<div class="row" >
					<div class="col-sm-3"></div>
						<div class="col-sm-6">
							<form method="post" action="#">
								<select name="yeargrad" id="program">
										<option value="0">Select School Year</option>
										<option value="1">2005-2006</option>
										<option value="2">2006-2007</option>
										<option value="3">2007-2008</option>
										<option value="4">2008-2009</option>
										<option value="5">2009-2010</option>
										<option value="6">2010-2011</option>
									</select>
								<button type="submit" name="search" class="btn btn-primary">SEARCH</button>
							</form>
						</div>
						<div class="col-sm-3"></div>
				</div>

				<div class="row">
					<div class="col-sm-3"></div>
					<div class="col-sm-6">
							<p><h4>Graduate per Program for the School Year <?php echo $schoolYear ?></h4></p>
								
					</div>
					<div class="col-sm-3"></div>
				</div>
				
				<div class="row">
					<div class="col-sm-3"></div>
					<div class="col-sm-3" id="canvas-holder">
							<canvas id="chart-area" width="500" height="550"/>			
						</div>
						<div class="col-sm-3" style = " padding-top: 2%">
							<div id="js-legend" class="chart-legend"></div>			
						</div>
						<div class="col-sm-3"></div>
				</div>


							

<script type="text/javascript">
						var yeargrad =  <?php echo json_encode($yeargrad); ?>;
						if(yeargrad == 1)
							var val = <?php echo json_encode($years1); ?>;
						else if(yeargrad == 2)
							var val = <?php echo json_encode($years2); ?>;
						else if(yeargrad == 3)
							var val = <?php echo json_encode($years3); ?>;
						else if(yeargrad == 4)
							var val = <?php echo json_encode($years4); ?>;
						else if(yeargrad == 5)
							var val = <?php echo json_encode($years5); ?>;
						else 
							var val = <?php echo json_encode($years6); ?>;

						var	discipline = <?php echo json_encode($discipline);?>;
					
						
						var doughnutData = [
								{
									value: val[0] ,
									color:"#F7464A",
									highlight: "#FF5A5E",
									label: discipline[0]
								},
								{
									value: val[1],
									color: "#46BFBD",
									highlight: "#5AD3D1",
									label: discipline[1]
								},
								{
									value: val[2],
									color: "#FDB45C",
									highlight: "#FFC870",
									label: discipline[2]
								},
								{
									value: val[3],
									color: "#949FB1",
									highlight: "#A8B3C5",
									label: discipline[3]
								},
								{
									value: val[4],
									color: "#616774",
									highlight: "#616774",
									label: discipline[4]
								},
								{
									value: val[5],
									color: "#0ed6f5",
									highlight: "#0ed6f5",
									label: discipline[5]								},
								{
									value: val[6],
									color: "#f50e16",
									highlight: "#f50e16",
									label: discipline[6]
								},
								{
									value: val[7],
									color: "#993913",
									highlight: "#993913",
									label: discipline[7]
								},
								{
									value: val[8],
									color: "#5e1b91",
									highlight: "#5e1b91",
									label: discipline[8]
								},
								{
									value: val[9],
									color: "#2b37d9",
									highlight: "#2b37d9",
									label: discipline[9]
								},
								{
									value: val[10],
									color: "#218221",
									highlight: "#218221",
									label: discipline[10]
								},
								{
									value: val[11],
									color: "#f5da0e",
									highlight: "#f5da0e",
									label: discipline[11]
								},
								{
									value: val[12],
									color: "#2BCDDF",
									highlight: "#f5da0e",
									label: discipline[12]
								},
								{
									value: val[13],
									color: "#EF770D",
									highlight: "#f5da0e",
									label: discipline[13]
								},
								{
									value: val[14],
									color: "#EF770D",
									highlight: "#f5da0e",
									label: discipline[14]
								},
								{
									value: val[15],
									color: "#4410AB",
									highlight: "#f5da0e",
									label: discipline[15]
								},
								{
									value: val[16],
									color: "#D81D5B",
									highlight: "#f5da0e",
									label: discipline[16]
								},
								{
									value: val[17],
									color: "#D81D5B",
									highlight: "#f5da0e",
									label: discipline[17]
								},
								{
									value: val[18],
									color: "#3C15DB",
									highlight: "#f5da0e",
									label: discipline[18]
								},
								{
									value: val[19],
									color: "#C1DB15",
									highlight: "#f5da0e",
									label: discipline[19]
								}
							];

							window.onload = function(){

								var ctx = document.getElementById("chart-area").getContext("2d");
								var myDoughnut = new Chart(ctx).Doughnut(doughnutData, {
									responsive : true,
		      					 	animationEasing: "easeOutQuart",
		      					 	animateRotate : true,
									animationSteps : 100,
									segmentShowStroke : true
									//legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].strokeColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>"

								});
								document.getElementById('js-legend').innerHTML = myDoughnut.generateLegend();
								
							};


						</script>
				
			</body>
</html>
