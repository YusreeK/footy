<?php include "db.php";
    	$comp_id=$_REQUEST['comp_id'];
    	$query = "DELETE FROM Competition WHERE comp_id ='$comp_id'";
    	header('location:competition.php');
    ?>