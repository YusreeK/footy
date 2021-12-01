<?php include "db.php";
include "functions.php";
?>
<html>
<head>
<title>Competition</title>
<h1>Welcome to the Competitions Page</h1>
</head>
<body>
<?php
echo "<td><a href='Football_Management_Soccer.php'>Home</a></td>";
?>
<br><br>
Here you can Add Edit and or Delete Competitions
<br><br>
<?php
echo '<table border="1" width="50%">';
    echo "<tr>";
        echo "<th>Competition</th>";
        echo "<th>Action</th>";
    echo "</tr>";
echo "</thead>";
echo "<tbody>";
while ($row = mysqli_fetch_array($result)) {
    echo "<tr>";
        echo "<td>" . $row['comp_name'] . "</td>";
        echo '<td><a href="edit.php?method=edit&id=["$comp_id"]">Edit</a>  <a href="delete.php?method=delete&id=[$comp_id]">Delete</a></td>';
        echo "</td>";
    echo "</tr>";
}
echo "</tbody>";                            
echo "</table>";

?>
<br><br>
<form method="post" action="competition.php"> 
Add competition <input type="text" name="comp_name">
  <br><br>
<input type="submit" name="submit" value="Submit"> 
</form>

</body>
</html>