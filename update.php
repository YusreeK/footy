<?php
    	include "db.php";
		include "functions.php";
    	$comp_id = $_GET['comp_id'];
    	$comp_name = $_POST['comp_name'];
     
    	$query = "UPDATE Competition set comp_name = '$comp_name' WHERE comp_id = '$comp_id'";
    	header('location:competition.php');
    ?>