<?php
session_start();
	$_SESSION["AC"]= $_GET["AC"];
	//$AC  = $_GET["AC"];
	$_SESSION["AT"] = $_GET["AT"];
	//$AT  = $_GET["AT"];
	$_SESSION["AA"] = $_GET["AA"];
	//$AA  = $_GET["AA"];
	$_SESSION["SAA"] = $_GET["SAA"];
	//$SAA = $_OGET["SAA"];
	$_SESSION["CM"] = $_GET["CM"];
	//$CM  = $_GET["CM"];
	$_SESSION["CP"] = $_GET["CP"];
	//$CP  = $_GET["CP"];
	$_SESSION["IA"] = $_GET["IA"];
	//$IA  = $_GET["IA"];
	$_SESSION["IR"] = $_GET["IR"];
	//$IR  = $_GET["IR"];
	$_SESSION["MA"] = $_GET["MA"];
	//$MA  = $_GET["MA"];
	$_SESSION["MP"] = $_GET["MP"];
	//$MP  = $_GET["MP"];
	$_SESSION["PEP"] = $_GET["PEP"];
	//$PEP = $_GET["PEP"];
	$_SESSION["PL"] = $_GET["PL"];
	//$PL  = $_GET["PL"];
	$_SESSION["PS"] = $_GET["PS"];
	//$PS  = $_GET["PS"];
	$_SESSION["RA"] = $_GET["RA"];
	//$RA  = $_GET["RA"];
	$_SESSION["SSA"] = $_GET["SSA"];
	//$SSA = $_GET["SSA"];
	$_SESSION["SCP"] = $_GET["SCP"];
	//$SCP = $_GET["SCP"];
	$_SESSION["SII"] = $_GET["SII"];
	//$SII = $_GET["SII"];
	?>
<!doctype html>
<html>
	<head>
		<title>NIST 800 - 53</title>
		<meta name="author" content="LER">
		<meta charset="UTF-8">
		<script src="js/Chart.js"></script>
		<script> var img;</script>
		<meta name = "viewport" content = "initial-scale = 1, user-scalable = no">
		<link REL="SHORTCUT ICON" HREF="logo.ico">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<style>
			canvas{
				box-shadow: 0px 0px 10px 4px rgba(119, 119, 119, 0.75);
				-moz-box-shadow: 0px 0px 10px 4px rgba(119, 119, 119, 0.75);
				-webkit-box-shadow: 0px 0px 10px 4px rgba(119, 119, 119, 0.75);
			    background: #EEE;
    			border: 1px solid #aaa;
    			border-radius: 15px;
			}
			#head {
				z-index: 100;
			}
		</style>
		<script src="js/jquery-2.1.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</head>
	<body bgcolor= "#FFF">
	<div class="container">

	<!--Beginnig of the header!-->
	<div class="row" id="head">
		<div class="col-lg-10">
			<img src="img/logo2.png" class="img-responsive">
		</div>
		<div class="col-lg-2">
			<form action="./tcpdf/examples/print.php" method="POST">
				<input type="hidden" name="img" id="hidden1">
				<button class="btn btn-default btn-lg" type="submit" name="submit" onclick="loadImage()" aria-label="Left Align">
					<span class="glyphicon glyphicon-print" aria-hidden="true"></span> Print
				</button>
			</form>
		</div>
	</div>
	<hr>
	<!--End of the header!-->
	<!--Beginnig of the content!-->
		<div class="row">
    		<div class="col-sm-12">
				<h1><center>NIST 800 - 53</center></h1>
			</div>
		</div>
		<div class="row">
    		<div class="col-lg-10">
				<h4><strong>Customer: </strong> ISM TEST</h4>
			</div>
			<div class="col-lg-2">
				<h4><strong>Date: </strong><?php echo date("d/m/Y"); ?></h4>
			</div>
		</div>
		
		<div class="row">
    		<div class="col-sm-8">
				<canvas id="canvas"></canvas>
				<center><small>Ratings for the NIST 800 - 53 standard, for each domain and presented as a percentage.</small></center>
			</div>
			<div class="col-sm-4">
				<center><h3>&nbsp;&nbsp;Legend</h3></center>
				<dl class="dl-horizontal">
					<dt>AC</dt>
					<dd>Access Control</dd>
					<dt>AT</dt>
					<dd>Awareness and Training</dd>
					<dt>AA</dt>
					<dd>Audit and Accountability</dd>
					<dt>SAA</dt>
					<dd>Security Assessment and Authorization</dd>
					<dt>CM</dt>
					<dd>Configuration Management</dd>
					<dt>CP</dt>
					<dd>Contingency Planning</dd>
					<dt>IA</dt>
					<dd>Identification and Authentication</dd>
					<dt>IR</dt>
					<dd>Incident Response</dd>
					<dt>MA</dt>
					<dd>Maintenance</dd>
					<dt>MP</dt>
					<dd>Media Protection</dd>
					<dt>PEP</dt>
					<dd>Physical and Environmental Protection</dd>
					<dt>PL</dt>
					<dd>Planning</dd>

					<dt>PS</dt>
					<dd>Personnel Security</dd>

					<dt>RA</dt>
					<dd>Risk Assessment</dd>

					<dt>SSA</dt>
					<dd>System and Services Acquisition</dd>

					<dt>SCP</dt>
					<dd>System and Communications Protections</dd>
					<dt>SII</dt>
					<dd>System and Information Integrity</dd>
				</dl>
			</div>
		</div>
		<!--End of the content!-->
		<!--Begining of footer!-->
		<div class="row">
			<div class="col-lg-12">
				<h3>Contact</h3>
				<p><strong>Telephone:</strong> +52 01-(33)3648-8950</p>
				<p><strong>Address:</strong> Av. Acueducto 4851 Piso 4 Int 1 y 3 Real Acueducto C.P. 45116 Zapopan, Jalisco.</p>
			</div>
		</div>
		
			
		<script>
		var radarChartData = {
			labels: ["AC", "AT", "AA", "SAA", "CM", "CP", "IA", "IR", "MA", "MP", "PEP", "PL", "PS", "RA", "SSA", "SCP", "SII"],
			datasets: [
				{
					label: "NIST800-53",
					fillColor: "#202D55",
					strokeColor: "rgba(200,220,220,1)",
					pointColor: "#67C44F",
					pointStrokeColor: "#fff",
					pointHighlightFill: "#fff",
					pointHighlightStroke: "rgba(0,0,255,1)",
					data: [<?php echo $_SESSION["AC"] ?>,<?php echo $_SESSION["AT"] ?>,<?php echo $_SESSION["AA"] ?>,<?php echo $_SESSION["SAA"] ?>,<?php echo $_SESSION["CM"] ?>,<?php echo $_SESSION["CP"] ?>,<?php echo $_SESSION["IA"] ?>,<?php echo $_SESSION["IR"] ?>,<?php echo $_SESSION["MA"] ?>,<?php echo $_SESSION["MP"] ?>,<?php echo $_SESSION["PEP"] ?>,<?php echo $_SESSION["PL"] ?>,<?php echo $_SESSION["PS"] ?>,<?php echo $_SESSION["RA"] ?>,<?php echo $_SESSION["SSA"] ?>,<?php echo $_SESSION["SCP"] ?>,<?php echo $_SESSION["SII"] ?>]
				}
			]
		};
		function loadImage(){
			var canvas = document.getElementById("canvas");
			img = canvas.toDataURL("image/png");
			img = img.replace(/^data:image\/(png|jpg);base64,/, "");
			document.getElementById("hidden1").value = img;
		}
		window.onload = function(){
			var canvasFilling = document.getElementById("canvas").getContext("2d");
			window.myRadar = new Chart(document.getElementById("canvas").getContext("2d")).Radar(radarChartData, {scaleOverride: true, scaleStartValue: 0, scaleStepWidth: 10, scaleSteps: 10,responsive: true});

		} 
		</script>
	</div>
	</body>
</html>