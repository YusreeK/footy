<?php
$connection = mysqli_connect('localhost', 'root', 'wawasan', 'Football');
if ($connection){
    echo "";
} else {
    die("Database Connection Failed");
}
?>