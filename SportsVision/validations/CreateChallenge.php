<?php
    require 'includes/DBOperations.php';
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (
            isset($_POST['userid']) &&
            isset($_POST['challenge_date']) &&
            isset($_POST['challenge_time']) &&
            isset($_POST['team_size']) &&
            isset($_POST['substitutes']) &&
            isset($_POST['address']) &&
            isset($_POST['challenge_type']) &&
            isset($_POST['challenge_amount']) &&
            isset($_POST['age_limit'])
        ) { 
            $db = new DBOperations();
            $cdn = "0";
            $ctn = "0";
            $pan = "0";
            
            if (isset($_POST['challenge_date_negotiable']) && $_POST['challenge_date_negotiable'] == "on"){
                $cdn = "1";
            }
            if (isset($_POST['challenge_time_negotiable']) && $_POST['challenge_time_negotiable'] == "on"){
                $ctn = "1";
            }

            if(isset($_POST['address_negotiable']) && $_POST['address_negotiable'] == "on"){
                $pan = "1";
            }

            echo $db->createChallenge(
                $_POST['userid'],
                $_POST['challenge_date'],
                $cdn,
                $_POST['challenge_time'],
                $ctn,
                $_POST['team_size'],
                $_POST['substitutes'],
                $_POST['address'],
                $pan,
                $_POST['challenge_type'],
                $_POST['challenge_amount'],
                $_POST['age_limit']
            );
            $db->closeDB();
        } else {
            echo "Fields are missing";
        }
    } else {
        echo "Invalid Request";
    }
?>