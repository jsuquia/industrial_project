<?php
/**
 * Created by IntelliJ IDEA.
 * User: Javier
 * Date: 18/09/2017
 * Time: 14:57
 */

require('user.php');

if(!isset($_COOKIE["user_session"]))
{
    $redirect_uri = 'https://' . $_SERVER['HTTP_HOST'] . '/2017-projects/team5/industrial_project/login.php';
    header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
    exit();
} else
{
    $user = new User;

    $session = $_COOKIE["user_session"];

    $user->loadbysession($session);

    if($user->isloaded != true)
    {
        $redirect_uri = 'https://' . $_SERVER['HTTP_HOST'] . '/2017-projects/team5/industrial_project/login.php';
        header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
        exit();
    }

}