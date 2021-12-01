<?php include "db.php";
$optionData1 =  '<option id ="0">Select Team</option>';
$optionData2 =  '<option id ="0">Select Competition</option>';
    $query = "SELECT * FROM Fixtures WHERE 1";
    $result = mysqli_query($connection, $query);
    if (!$result) {
        die('Failed' .  mysqli_error());
    }
?>
<html>
<head>
<title>Fixtures</title>
</head>
<h1> Welcome to the Fixtures Admin page.</h1>
<body>
<?php
echo "<td><a href='Football_Management_Soccer.php'>Home</a></td>";
?>
<br><br>
Here you will be able to Add a Fixture Edit and Delete the Fixture.
<br><br>
<?php
echo '<table border="1" width="70%">';
    echo "<tr>";
        echo "<th>Fixture</th>";
        echo "<th>Date</th>";
        echo "<th>Time</th>";
        echo "<th>Home Team</th>";
        echo "<th>Away Team</th>";
        echo "<th>Comp</th>";
        echo "<th>Action</th>";
    echo "</tr>";
echo "</thead>";
echo "<tbody>";
while ($row = mysqli_fetch_array($result)) {
        echo "<td>" . $row['fixture_id'] . "</td>";
        echo "<td>" . $row['fixture_date'] . "</td>";
        echo "<td>" . $row['fixture_time'] . "</td>";
        echo "<td>" . $row['home_teamID'] . "</td>";
        echo "<td>" . $row['away_teamID'] . "</td>";
        echo "<td>" . $row['comp_id'] . "</td>";
        echo ' <td><a href="href.php?method=edit&id={theID}">Edit</a>  <a href="href.php?method=edit&id={theID}">Delete</a></td>';
        echo "</td>";
    echo "</tr>";
}
echo "</tbody>";                            
echo "</table>";
?>
<br><br>
<p>
Add Fixture:
</p>
<pre>
    
 <form method="post" action="fixtures.php"> 
Date:   <input type="text" name="fixture_date"><br />
Time:   <input type="text" name="fixture_time"><br />
<?php
// selecting the form data
$query = "SELECT * FROM Teams";
$result = mysqli_query($connection, $query);
while ($row = $result->fetch_assoc()) {
  $optionData1 .= "<option value=".$row['team_id'].">".$row['team_id']."</option>";


}
if(!$result){
  die('Failed' .  mysqli_error());
}
?>
Select Home Team <select name="home_teamID" id="home_teamID">
<pre><?php echo $optionData1;?></pre>
</select>
<br><br>
Select Away Team <select name="away_teamID"  id="away_teamID">
<pre><?php echo $optionData1;?></pre>
</select>
<br><br>
<?php
$query = "SELECT * FROM Competition WHERE 1";
$result = mysqli_query($connection, $query);
while ($row = $result->fetch_assoc()) {
$optionData2 .= "<option value=".$row['comp_id'].">".$row['comp_id']."</option>";
}
if(!$result){
    die('Failed' .  mysqli_error());
    exit();
  }
?>
Select Competition <select name="comp_id"  id="comp_id">
<pre><?php echo $optionData2;?></pre>
</select>
<br><br>
<?php
//submitting your form data
if(isset($_POST['submit'])){
$fixture_date = $_POST['fixture_date'];
$fixture_time = $_POST['fixture_time'];
$home_teamID = $_POST['home_teamID'];
$away_teamID = $_POST['away_teamID'];
$comp_id = $_POST['comp_id'];

if($connection){
    echo "";
} else {
   die("Unable to Capture Data");
}
$query = "INSERT INTO Fixtures (fixture_date, fixture_time, home_teamID, away_teamID, comp_id) 
VALUES ('$fixture_date', '$fixture_time', '$home_teamID', '$away_teamID', '$comp_id');";
$query .= "INSERT INTO Reports (fixture_date, fixture_time, home_teamID, away_teamID, comp_id) 
VALUES ('$fixture_date', '$fixture_time', '$home_teamID', '$away_teamID', '$comp_id')";
$result = mysqli_query($connection, $query);
header("location:fixtures.php");
if ($connection) {
}
}
?>
<input type="submit" name="submit" value="Submit"> 
</form>

</pre>
 </body>
</html>