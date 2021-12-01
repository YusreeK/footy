<?php include "db.php";?>
<?php
$query = "SELECT * FROM Teams WHERE 1";
$result = mysqli_query($connection, $query);
if(!$result){
  die('Failed' .  mysqli_error());
}

?>
<?php
if(isset($_POST['submit'])){
  $team_name = $_POST['team_name'];
  $Email = $_POST['Email'];
  if($connection){
      echo "";
  } else {
     die("Unable to Capture Data");
  }
  $query = "INSERT INTO Teams (team_name, email) VALUE ('$team_name', '$email');"; 
  $query .= "INSERT INTO Reports (team_name, email) VALUE ('$team_name', '$email')"; 
  $result = mysqli_query($connection, $query);
  header("location:teams.php");
  exit();
  if(!$result){
     die('Failed' .  mysqli_error());
  }
  }
 
?>