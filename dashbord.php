<?php
/**
 * Created by IntelliJ IDEA.
 * User: Javier
 * Date: 15/09/2017
 * Time: 11:52
 */
require('php_scripts/check_cookie.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/dashbord.css">
</head>
<body>

    <?php require('navbar.php'); ?>

    <div class="container-fluid">
        <div class="main-header">
            <h1 class="display-2 d-inline bold">yoyo</h1> <h1 class="display-2 d-inline"> analytics</h1>
        </div>

        <br><br><br>

        <div class="header">
            <h2>OVERALL SALES BY OUTLET</h2>
        </div>
        <br>
        <div class="row">
            <div class="col-12 col-lg-4">
                <div class="sub-header">
                    <h4 class="d-inline">LAST WEEK &nbsp;</h4><?php $previous_week = date("d/m/Y", strtotime("last week monday"));?> <p class="d-inline"><?=$previous_week?></p>
                    <canvas id="myChart" width="200" height="200"></canvas>
                </div>
            </div>

            <div class="col-12 col-lg-4">
                <div class="sub-header">
                    <h4 class="d-inline">2 WEEKS AGO &nbsp;</h4><?php $previous_week = date("d/m/Y", strtotime("-3 week monday"));?> <p class="d-inline"><?=$previous_week?></p>
                </div>
            </div>

            <div class="col-12 col-lg-4">
                <div class="sub-header">
                    <h4 class="d-inline">3 WEEKS AGO &nbsp;</h4><?php $previous_week = date("d/m/Y", strtotime("-4 week monday"));?> <p class="d-inline"><?=$previous_week?></p>
                </div>
            </div>
        </div>

    </div>



    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.min.js"></script>

    <script>
        var ctx = document.getElementById("myChart");

        data = {
            datasets: [{
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1,

            }],

            // These labels appear in the legend and in the tooltips when hovering different arcs
            labels: [
                'Mono',
                'Liar',
                'Library',
                'Premier',
                'Ninewells',
                'Floor 5'
            ]

        };

        var myDoughnutChart = new Chart(ctx, {
            type: 'doughnut',
            data: data,
            options: {
                legend: {
                    display: true,
                    position: 'bottom',
                    labels: {
                        fontSize: 25
                    }
                }
            }
        });
    </script>
</body>
</html>


