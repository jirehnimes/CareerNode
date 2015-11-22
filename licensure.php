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
			$years = array();
			$passer= array();
			$taker= array();
			$percent_passing= array();
			$value = array();
			$counter = 0;
			$schools = $_POST['schools'];	
			$program = $_POST['program'];		

					$query = "select * from  Schools sc inner join  Licensure li 
					on li.school_id=sc.school_id where li.discipline like '%".$program."%' and li.school_id = ".$schools."";
				 	$result = odbc_exec($conn,$query);
				 	while($out = odbc_fetch_array($result)){
				 			$years[$counter] = $out['year_taken'];
				 			$passer[$counter] = $out['passer'];
				 			$taker[$counter] = $out['taker'];
				 			$percent_passing[$counter] = $out['percent_passing'];
							$counter++;
				 	}
		}else{
							$years = [0,0,0,0];
				 			$passer= [0,0,0,0];
				 			$taker = [0,0,0,0];
				 			$percent_passing = [0,0,0,0];
				 			$program = "";

		}					
				

?>
		
<!doctype html>
<html>
	<head>
		<title>Line Chart</title>
		<script src="Chart.js-master/Chart.js"></script>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="bootstrap/bootstrap-3.3.5/bootstrap-3.3.5/docs/dist/css/bootstrap.min.css">
		<script src="bootstrap/bootstrap-3.3.5/bootstrap-3.3.5/js/tests/vendor/jquery.min.js"></script>
		<script src="bootstrap/bootstrap-sass-3.3.5/bootstrap-sass-3.3.5/assets/javascripts/bootstrap.min.js"></script>
	</head>
	<body>
		<div class="row" >
						<div class="col-sm-3"></div>
						<div class="col-sm-6">	
							<form method="post" action="#">
									<select name="schools" id="program">
										<option value="0">Select School</option>
										<option value="12">Technological Institute of the Philippines, QC</option>
										<option value="6">Polytechnic University of the Philippines</option>
									</select>
									<select name="program" id="program">
										<option value="0">Select Program</option>
										<option value="Civil Engineering">Civil Engineering</option>
										<option value="Electronics Engineering">Electronics Engineering</option>
									</select>
									<button type="submit" name="search" class="btn btn-primary">SEARCH</button>
							</form>
						</div>
						<div class="col-sm-3"></div>
				</div>

				<div class="row">
					<div class="col-sm-3"></div>
					<div class="col-sm-6">
							<p><h3>Passing Rate per Year for <?php echo $program ?></h3></p>
								
					</div>
					<div class="col-sm-3"></div>
				</div>
				
				<div class="row">
					<div class="col-sm-3"></div>
					<div class="col-sm-6" id="canvas-holder">
							<div style="width:30%">
								<div>
								<canvas id="canvas" height="400" width="600"></canvas>
								</div>
							</div>		
					</div>
					<div class="col-sm-3"></div>
				</div>

				<div class="row">
					<div class="col-sm-3"></div>
					<div class="col-sm-6">
							<h3>Takers VS Passer</h3>
							<h5><button type="text" style = "background-color:rgb(0,128,255)" disabled>.    .</button>     Takers
							<button type="text" style = "background-color:rgb(51,255,51)" disabled>.    .</button> 	Passer</h5>
					</div>
					<div class="col-sm-3"></div>
				</div>

				<div class="row">
					<div class="col-sm-3"></div>
					<div class="col-sm-6">
							<div style="width: 80%">
								<canvas id="bar_canvas" height="500" width="600"></canvas>
							</div>		
					</div>
					<div class="col-sm-3"></div>
				</div>

		


	<script>
//line-graph
		var years = <?php echo json_encode($years);?>;
		var passer = <?php echo json_encode($passer);?>;
		var taker = <?php echo json_encode($taker);?>;
		var percent_passing = <?php echo json_encode($percent_passing);?>;

		if(years == "NULL")
			years = [0,0,0,0];
		if(percent_passing == "NULL")
			percent_passing = [0,0,0,0];

		var lineChartData = {
			labels : [years[0],years[1],years[2],years[3]],
			datasets : [
				{
					label: "My First dataset",
					fillColor : "rgba(220,220,220,0.2)",
					strokeColor : "rgba(0,128,255,1)",
					pointColor : "rgba(0,153,0,1)",
					pointStrokeColor : "#606060",
					pointHighlightFill : "#000066",
					pointHighlightStroke : "rgba(204,102,0,1)",
					data : [percent_passing[0],percent_passing[1],percent_passing[2],percent_passing[3]]
				}
			]

		}

	
	

//bar-graph
	
	var years = <?php echo json_encode($years);?>;
		var passer = <?php echo json_encode($passer);?>;
		var taker = <?php echo json_encode($taker);?>;
		var percent_passing = <?php echo json_encode($percent_passing);?>;
	var barChartData = {
		labels : [years[0],years[1],years[2],years[3]],
		datasets : [
			{
				fillColor : "rgba(0,128,255,0.6)",
				strokeColor : "rgba(0,128,255,1)",
				highlightFill: "rgba(220,220,220,0.2)",
				highlightStroke: "rgba(204,102,0,1)",
				data : [taker[0],taker[1],taker[2],taker[3]]
				},
			{
				fillColor : "rgba(51,255,51,0.6)",
				strokeColor : "rgba(0,255,0,1)",
				highlightFill: "rgba(0,255,0,0.2)",
				highlightStroke: "rgba(204,102,0,1)",
				data : [passer[0],passer[1],passer[2],passer[3]]
				}
		]

	}
	window.onload = function(){
		var ctx = document.getElementById("canvas").getContext("2d");
		window.myLine = new Chart(ctx).Line(lineChartData, {
			scaleShowGridLines : true,
		    scaleGridLineColor : "rgba(160,160,160,.4)",
		    bezierCurve : true

		});


		var ctx = document.getElementById("bar_canvas").getContext("2d");
		window.myBar = new Chart(ctx).Bar(barChartData, {
			responsive : true
		});
	}

	</script>
	</body>
</html>

