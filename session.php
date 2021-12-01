<?php
//echo "<table border='1' width='50%'><tr>"; 
echo "<td><a href='Football_Management_Soccer.php'>Home </a></td>";

//echo "<td align='right'><a href='cart.php'>View Cart</a></td></tr>";
echo "<tr><td>";
if (isset($_SESSION[''])) {
echo ", ";
echo $_SESSION[''];
//echo "</td><td align='right'><a href='logout.php'>Logout</a>"; 
}
else 
{
echo " "; }
echo "</td></tr></table>";
echo "<br><br>";
// set the default time zone 
date_default_timezone_set('Africa/South_Africa'); 
echo "Today is ";
echo date ('d F, Y ') ;
echo "<span id='clockFace' >";
echo date('G:i:s');
echo "</span>";
?>