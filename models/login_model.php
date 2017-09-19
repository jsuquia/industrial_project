<?php
/**
 * Created by IntelliJ IDEA.
 * User: Javier
 * Date: 18/09/2017
 * Time: 10:33
 */

require('../php_scripts/db.php');

if(isset($_SESSION["privilege"]))
{
    header("Location: index.php");
    exit;
}

if(isset($_POST["submit"]))
{

    $username = $_POST["username"];
    $password = $_POST["password"]; //HASH THIS HERE PLEASE

    //$password_hash = password_hash( $password_plaintext, PASSWORD_DEFAULT, [ 'cost' => 11 ] );

    $sql = "SELECT * FROM ip17team5db.users";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {

            if (password_verify($password, $row["password"]))
            {
                if($row["username"] == $username)
                {
                    $randomstring = generateRandomString(120);

                    $stmt = $conn->prepare("INSERT INTO ip17team5db.session (ID, user_id) VALUES (?,?)");
                    $stmt->bind_param("ss", $randomstring, $userid);

                    $userid = $row["ID"];

                    $stmt->execute();

                    setcookie("user_session",$randomstring,time() + (10 * 365 * 24 * 60 * 60), "/");

                    $redirect_uri = 'https://' . $_SERVER['HTTP_HOST'] . '/2017-projects/team5/industrial_project/dashbord.php';
                    header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
                    exit();
                }
                else
                {
                    $redirect_uri = $_SERVER['HTTP_REFERER'];
                    header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
                    exit();
                }
            } else {
                $redirect_uri = $_SERVER['HTTP_REFERER'];
                header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
                exit();
            }

        }
    } else {
        //0 results
    }

    $conn->close();
}


function generateRandomString($length) {
    return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
}