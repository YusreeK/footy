<?php include "db.php";
$optionData2 =  '<option id ="0">Select Competition</option>';
$optionData3 =  '<option id ="0">Select Player</option>';
$query = "SELECT * FROM Player_fixtures";
$result = mysqli_query($connection, $query);
if(!$result){
  die('Failed' .  mysqli_error());
}
?>
<html>
<head>
<title>Player Fixtures</title>
<h1>Welcome to the Player Fixtures Page</h1>
<br>
</head>
<body>
<?php
echo "<td><a href='Football_Management_Soccer.php'>Home</a></td>";
?>
<br><br>
Here you can Add Edit and or Delete player goals scored across various fixtures.
<br><br>
<?php
echo '<table border="1" width="70%">';
echo "<thead>";
    echo "<tr>";
        echo "<th>Player</th>";
        echo "<th>Fixture</th>";
        echo "<th>Goals Scored</th>";
        echo "<th>Action</th>";
    echo "</tr>";
echo "</thead>";
echo "<tbody>";
while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['fullname'] . "</td>";
        echo "<td>" . $row['fixture_id'] . "</td>";
        echo "<td>" . $row['goals_scored'] . "</td>";
        echo ' <td><a href="href.php?method=edit&id={theID}">Edit</a>  <a href="href.php?method=edit&id={theID}">Delete</a></td>';
        echo "</td>";
    echo "</tr>";
}
echo "</tbody>";                            
echo "</table>";
?>
<br><br>
<?php
$query = "SELECT * FROM Players";
$result = mysqli_query($connection, $query);
while ($row = $result->fetch_assoc()) {
$optionData3 .= "<option value=".$row['fullname'].">".$row['fullname']."</option>";


}
if(!$result){
  die('Failed' .  mysqli_error($connection));
}
?>
<br><br>
<?php
// selecting the form data
$query = "SELECT * FROM Fixtures";
    $result = mysqli_query($connection, $query);
while ($row = $result->fetch_assoc()) {
    $optionData1 .= "<option value=".$row['fixture_id'].">".$row['fixture_id']."</option>";
}
if(!$result){
  die('Failed' .  mysqli_error($connection));
}
?>
<form method="post" action="player_fixtures.php"> 
Player <select name="fullname"  id="fullname">
<pre><?php echo $optionData3;?></pre>
</select>
<br><br>
Fixture <select name="fixture_id"  id="fixture_id">
<pre><?php echo $optionData1;?></pre>
</select>
<br><br>
Goals: <input name="goals_scored" id="goals_scored"><br>
<br><br>
<input type="submit" name="submit" value="Submit"> 
<?php
//submitting your form data
if(isset($_POST['submit'])){
$fullname = $_POST['fullname'];
$fixture_id = $_POST['fixture_id'];
$goals_scored = $_POST['goals_scored'];
if($connection){
    echo "" ;
} else {
   die("Unable to Capture Data");
}
$query = "INSERT INTO Player_fixtures (fullname, fixture_id, goals_scored) 
VALUES ('$fullname', '$fixture_id', '$goals_scored');";
$query .= "INSERT INTO Reports (goals_scored) VALUES ($goals_scored)";
$result = mysqli_query($connection, $query);
header("location:player_fixtures.php");
if ($connection) {
}
}
?>
</form>
</body>
</html>