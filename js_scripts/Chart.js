
function barChart(names, dataPoints, graphName, canvasName)
{
	var ctx = document.getElementById(canvasName).getContext('2d');
	var myChart = new Chart(ctx, {
    type: 'bar',
	xAxisID: 'Day',
    data: {
        labels: names,
        datasets: [{
            label: graphName,
            data: dataPoints,

            borderWidth: 1
        }]
    }
});
	
}


function areaChart(names, dataPoints, graphName, canvasName)
{
	var ctx = document.getElementById(canvasName).getContext('2d');
	var myChart = new Chart(ctx, {
    type: 'line',
	xAxisID: 'Day',
    data: {
        labels: names,
        datasets: [{
            label: graphName,
            data: dataPoints
        }]
    }
});
	
}