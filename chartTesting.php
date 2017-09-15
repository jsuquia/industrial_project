<!doctype html>
<html>

<head>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js"></script>

</head>

<body>

	
<div style="height:30vh; width:40vw">
	<canvas id="myChart"></canvas>
	</div>
<script>

var ctx = document.getElementById("myChart").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
	xAxisID: 'Day',
    data: {
        labels: ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"],
        datasets: [{
            label: 'Total Transactions by day',
            data: [234, 633, 282, 221, 502, 654, 66],

            borderWidth: 1
        }]
    }
});

</script>
sdfsdf
<div style="height:30vh; width:40vw">
	<canvas id="myChart2""></canvas>
	</div>
<script>

var ctx = document.getElementById("myChart2").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"],
        datasets: [{
            label: 'Total Transactions by day',
            data: [234, 633, 282, 221, 502, 654, 66],

            borderWidth: 1
        }]
    }
});

</script>
sdfsdf
<div style="height:30vh; width:40vw">
	<canvas id="myChart3"></canvas>
	</div>
<script>

var ctx = document.getElementById("myChart3").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"],
        datasets: [{
            label: 'Total Transactions by day',
            data: [234, 633, 282, 221, 502, 654, 66],

            borderWidth: 1
        }]
    }
});

</script>
sdfsdf

</body>

</html>
