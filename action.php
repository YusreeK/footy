<?php
include "db.php";
    if($_SERVER["REQUEST_METHOD"] == "POST") {
    $team_id = $_POST['team_id'];
    $fullname = $_POST['fullname'];
    $player_sqd_num = $_POST['player_sqd_num'];
    $position_descr = $_POST['position_descr'];
if($connection){
    echo "";
} else {
   die("Unable to Capture Data");
}
$query = "INSERT INTO Players (team_id, fullname, player_sqd_num, position_descr) 
VALUE ('$team_id', '$fullname', '$player_sqd_num', '$position_descr');";
$query .= "INSERT INTO Reports (fullname) 
VALUES ('$fullname')";
echo "<meta http-equiv='refresh' content='0;url=html.php'>";
$result = mysqli_query($connection, $query);
header("location:players.php");
exit;
if(!$result){
   die('Failed' .  mysqli_error($connection));
}
}
?>