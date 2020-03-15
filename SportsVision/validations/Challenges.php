<?php
    require 'includes/DBOperations.php';
    $db = new DBOperations();
    
    echo json_encode($db->getChallenges());
?>