<!doctype html>
<html>

<head>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.js"></script>
	<script src="js_scripts/Chart.js"></script>


</head>

<body>

	
    <div style="height:30vh; width:40vw">
	<canvas id="myChart"></canvas>
	</div>

    <div style="height:30vh; width:40vw">
    <canvas id="myChart2"></canvas>
    </div>

    <div style="height:30vh; width:40vw">
    <canvas id="myChart3"></canvas>
    </div>

<script>

names = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];
dataPoints = [234, 633, 282, 221, 502, 654, 66];
graphName = "Total Transactions by day";
barChart(names, dataPoints, graphName, "myChart");

names = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];
dataPoints = [234, 633, 282, 221, 502, 654, 66];
graphName = "Total Transactions by day";
areaChart(names, dataPoints, graphName, "myChart2");


</script>
