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
			$school = array();
			$tution= array();
			$counter = 0;
			$area = $_POST['area'];
			

					$query = "select * from Schools sc inner join Tuition_Fee t
								on t.school_id=sc.school_id where sc.area like '%".$area."%'";
				 	$result = odbc_exec($conn,$query);
				 	while($out = odbc_fetch_array($result)){
				 			$school[$counter] = $out['school'];
							$tution[$counter] = $out['tuition_per_unit'];
							$counter++;
				 	}
		}else{
				$area = "";			

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
								<select name="area" id="program">
										<option value="0">Select School Year</option>
										<option value="QC">Quezon City</option>
										<option value="Manila">Manila</option>										
									</select>
								<button type="submit" name="search" class="btn btn-primary">SEARCH</button>
							</form>
						</div>
						<div class="col-sm-3"></div>
				</div>

				<div class="row">
					<div class="col-sm-3"></div>
					<div class="col-sm-6">
							<p><h4>Tution Fee per Unit of Schools in <?php echo $area ?></h4></p>
								
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
					var school =  <?php echo json_encode($school); ?>;
					var val = <?php echo json_encode($tution); ?>;
					var doughnutData = [
								{
									value: val[0] ,
									color:"#F7464A",
									highlight: "#FF5A5E",
									label: school[0]
								},
								{
									value: val[1],
									color: "#46BFBD",
									highlight: "#5AD3D1",
									label: school[1]
								},
								{
									value: val[2],
									color: "#FDB45C",
									highlight: "#FFC870",
									label: school[2]
								},
								{
									value: val[3],
									color: "#949FB1",
									highlight: "#A8B3C5",
									label: school[3]
								},
								{
									value: val[4],
									color: "#616774",
									highlight: "#616774",
									label: school[4]
								},
								{
									value: val[5],
									color: "#0ed6f5",
									highlight: "#0ed6f5",
									label: school[5]								
								},
								{
									value: val[6],
									color: "#f50e16",
									highlight: "#f50e16",
									label: school[6]
								},
								{
									value: val[7],
									color: "#993913",
									highlight: "#993913",
									label: school[7]
								},
								{
									value: val[8],
									color: "#5e1b91",
									highlight: "#5e1b91",
									label: school[8]
								},
								{
									value: val[9],
									color: "#2b37d9",
									highlight: "#2b37d9",
									label: school[9]
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
