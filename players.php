<?php
include "db.php";
if(isset($_GET['sort']) && isset($_GET['order'])){if(isset($_GET['order'])){
    $order = $_GET['order'];
}else{
    $order = 'fullname';
}
if(isset($_GET['sort'])){
    $sort = $_GET['sort'];
}else{
    $sort = 'ASC';
}
$optionData1 =  '<option id ="0">Select Team</option>';
$query = "SELECT * FROM Players ORDER BY $order $sort";
$result = mysqli_query($connection, $query);
if(!$result){
    die('Failed' . mysqli_error($connection));
}

} else { 

$optionData1 =  '<option id ="0">Select Team</option>';
$query = "SELECT * FROM Players";
$result = mysqli_query($connection, $query);
if(!$result){
    die('Failed' . mysqli_error($connection));
}
}

?>
<html>
    <head>
    <title>Player Information</title>
    </head>
        <h1> Welcome to the Player Information Admin page.</h1>
    <body>
    <?php
        echo "<td><a href='Football_Management_Soccer.php'>Home</a></td>";
    ?>
<br><br>
    Here you will be able to Add a Player and Assign the player to a team 
    and select the player position and Edit and Delete the Information.
<br><br>
        <?php
        echo '<table border="1" width="70%">';
        echo "<thead>";
        echo "<tr>";
            echo "<th><a href='?order=team_id&&sort=$sort'>Team</a></th>";
            echo "<th><a href='?order=fullname&&sort=$sort'>Player</a></th>";
            echo "<th>Shirt Number</th>";
            echo "<th>Position</th>";
            echo "<th>Action</th>";
        echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    echo "<tr>";
    while ($row = mysqli_fetch_array($result)) {
            echo "<td>" . $row['team_id'] . "</td>";
            echo "<td>" . $row['fullname'] . "</td>";
            echo "<td>" . $row['player_sqd_num'] . "</td>";
            echo "<td>" . $row['position_id'] . "</td>";
            echo ' <td><a href="href.php?method=edit&id={theID}">Edit</a>  <a href="href.php?method=edit&id={theID}">Delete</a></td>';
            echo "</td>";
        echo "</tr>";
    }
    echo "</tbody>";                            
    echo "</table>";

// selecting the form data
if(isset($_GET['sort']) && isset($_GET['order'])){if(isset($_GET['order'])){
    $order = $_GET['order'];
}else{
    $order = 'team_id';
}
if(isset($_GET['sort'])){
    $sort = $_GET['sort'];
}else{
    $sort = 'ASC';
}
$optionData1 =  '<option id ="0">Select Team</option>';
$query = "SELECT * FROM Teams ORDER BY $order $sort";
$result = mysqli_query($connection, $query);
if(!$result){
    die('Failed' . mysqli_error($connection));
}

} else { 
$query = "SELECT * FROM Teams";
$result = mysqli_query($connection, $query);
while ($row = $result->fetch_assoc()) {
  $optionData1 .= "<option value=".$row['team_id'].">".$row['team_id']."</option>";


}
if(!$result){
  die('Failed' .  mysqli_error($connection));
}
}
?>

<p>
Add Player:
</p>
<br><br>

 <form action="action.php" method="post"> 
 Full Name         : <input type="text" name="fullname">
 <br><br>

 Select Team <select name="team_id" id="team_id">
<pre><?php echo $optionData1;?></pre>
</select>
<br><br>
Shirt  Number: <input type="text" name="player_sqd_num"><br>
<br><br>
Position:
<br>
<table border="1">
<tr rowspan="2">
<td><input type="radio" name="position_descr" value="GK" />GK</td>
<td><input type="radio" name="position_descr" value="CB" />CB</td>
</tr>
<tr rowspan="2">
<td><input type="radio" name="position_descr" value="LB" />LB</td>
<td><input type="radio" name="position_descr" value="FB" />FB</td>
</tr>
<tr rowspan="2">
<td><input type="radio" name="position_descr" value="LWB" />LWB</td>
<td><input type="radio" name="position_descr" value="RWB" />RWB</td>
</tr>
<tr rowspan="2">
<td><input type="radio" name="position_descr" value="SW" />SW</td>
<td><input type="radio" name="position_descr" value="DM" />DM</td>
</tr>
<tr rowspan="2">
<td><input type="radio" name="position_descr" value="CM" />CM</td>
<td><input type="radio" name="position_descr" value="AM" />AM</td>
</tr>
<tr rowspan="2">
<td><input type="radio" name="position_descr" value="LW" />LW</td>
<td><input type="radio" name="position_descr" value="RW" />RW</td>
</tr>
<tr rowspan="2">
<td><input type="radio" name="position_descr" value="CF" />CF</td>
<td><input type="radio" name="position_descr" value="WF" />WF</td>
</tr>
</table>
<br><br>

<input type="submit"  value="submit">
</form>
 </body>
</html>