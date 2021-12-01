<?php include "db.php";
include "functions3.php";
?>
<html>
<head>
<title>Player Position</title>
</head>
<h1>Welcome to the Player Position Page</h1>
<?php
echo "<td><a href='Football_Management_Soccer.php'>Home</a></td>";
?>
<br><br>
Here you can Add Edit and or Delete Player Positions
<br><br>

<br><br>
<body>
<?php
echo '<table border="1" width="50%">';
    echo "<tr>";
        echo "<th>Position</th>";
        echo "<th>Action</th>";
    echo "</tr>";
echo "</thead>";
echo "<tbody>";
while ($row = mysqli_fetch_array($result)) {
    echo "<tr>";
        echo "<td>" . $row['position_descr'] . "</td>";
        echo ' <td><a href="href.php?method=edit&id={theID}">Edit</a>  <a href="href.php?method=edit&id={theID}">Delete</a></td>';
        echo "</td>";
    echo "</tr>";
}
echo "</tbody>";                            
echo "</table>";
?>
<br><br>
<form method="post" action="player_position.php"> 
Add Position <input type="text" name="position">
  <br><br>
<input type="submit" name="submit" value="Submit"> 
</form>
</body>
</html>