<?php

// Delete method to delete records from database.


require_once 'dbconnect.php';

$object = new DbConnect();
if(isset($_GET['Del'])){
    $UserID = $_GET['Del'];
    $stmt = $object->connection->query("DELETE FROM users WHERE ID='".$UserID."'");

    if($stmt){
        header("location:view.php");
    }else{
        echo "Please check your query";
    }
}
