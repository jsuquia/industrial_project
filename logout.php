<?php
/**
 * Created by IntelliJ IDEA.
 * User: Javier
 * Date: 18/09/2017
 * Time: 15:16
 */

setcookie("user_session",'', 1, "/");

$redirect_uri = 'https://' . $_SERVER['HTTP_HOST'] . '/2017-projects/team5/industrial_project/login.php';
header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
exit();