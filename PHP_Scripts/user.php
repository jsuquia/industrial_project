<?php
/**
 * Created by IntelliJ IDEA.
 * User: Javier
 * Date: 18/09/2017
 * Time: 14:57
 */

require('db.php');

class User
{

    var $isloaded = false;

    var $username = "ERROR";
    var $email = "ERROR";
    var $priviledge = "ERROR";


    function loadbysession($sessionid)
    {
        global $conn;

        $sql = "SELECT ID, user_id FROM ip17team5db.session WHERE ID='$sessionid'";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc())
            {
                $this->loadbyuserid($row["user_id"]);
            }
        } else
        {
            return;
        }
    }

    function loadbyuserid($userid)
    {
        global $conn;

        $sql = "SELECT ID, username, email, priviledge FROM ip17team5db.users WHERE ID=$userid";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc())
            {
                $this->isloaded = true;
                $this->username = $row["username"];
                $this->email = $row["email"];
                $this->priviledge = $row["priviledge"];
            }
        } else
        {
            return;
        }
    }

}