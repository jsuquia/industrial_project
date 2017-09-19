<?php
/**
 * Created by IntelliJ IDEA.
 * User: Javier
 * Date: 15/09/2017
 * Time: 11:52
 */
if(isset($_COOKIE["user_session"]))
{
    $redirect_uri = 'https://' . $_SERVER['HTTP_HOST'] . '/2017-projects/team5/industrial_project/dashbord.php';
    header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
}

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

    <link rel="stylesheet" href="css/login.css">
</head>
<body>

<div class="container-fluid">
    <div class="row align-items-center">
        <div class="col-6 hidden-sm-down" id="left">
            <img src="img/login.png" class="img-fluid mx-auto d-block" alt="Responsive image">
        </div>

        <div class="col-12 col-md-6" id="right">

            <div class="row justify-content-center">
                <div class="col-6 content">
                    <h1 class="display-5 d-inline bold">SIGN IN</h1>
                    <br><br><br><br>
                    <form action="models/login_model.php" method ="post">
                        <div class="form-group">
                            <h5>USERNAME</h5>
                            <input type="text" name="username" class="form-control" id="username" aria-describedby="usernameHelp" placeholder="donald_trump" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <h5>PASSWORD</h5>
                            <input type="password" name="password" class="form-control" id="password" placeholder="*************" required>
                        </div>

                        <br>
                        <button type="submit" name="submit" class="btn btn-primary"><b>SIGN IN</b></button>

                    </form>

                </div>
            </div>


        </div>
    </div>

</div>



<!-- jQuery first, then Tether, then Bootstrap JS. -->
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

</body>
</html>


