<?php include "db.php";
$query = "SELECT * FROM Player_positions";
$result = mysqli_query($connection, $query);
if(!$result){
  die('Failed' .  mysqli_error());
}
  else

if(isset($_POST['submit'])){
$position_descr = $_POST['position_descr'];
if($connection){
    echo "";
} else {
   die("Unable to Capture Data");
}
$query = "INSERT INTO Player_positions (position_descr) VALUE ('$position_descr')";
$result = mysqli_query($connection, $query);
header("location: player_position.php");
exit;
if(!$result){
   die('Failed' .  mysqli_error());
}
}


?>
