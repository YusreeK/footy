<?php include "db.php";
$optionData2 =  '<option id ="0">Select Competition</option>';
$query = "SELECT * FROM Competition";
$result = mysqli_query($connection, $query);
if(!$result){
  die('Failed' .  mysqli_error());
}
  else

if(isset($_POST['submit'])){
$comp_name = $_POST['comp_name'];
if($connection){
    echo "";
} else {
   die("Unable to Capture Data");
}
$query = "INSERT INTO Competition (comp_name) VALUE ('$comp_name');";
$query .= "INSERT INTO Reports (comp_name)
VALUES ('$comp_name')";
$result = mysqli_query($connection, $query);
header("location: competition.php");
exit;
if(!$result){
   die('Failed' .  mysqli_error());
}
}


?>