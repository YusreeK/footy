<?php
    	include "db.php";
        include "update";
    	$comp_id = $_GET['comp_id'];
    	$query = "SELECT * FROM Competition WHERE comp_id = '$comp_id'";
    	$result = mysqli_query($connection, $query);
            if(!$result){
              die('Failed' .  mysqli_error());
            }
    ?>
    <!DOCTYPE html>
    <html>
    <head>
    <title>Basic MySQLi Commands</title>
    </head>
    <body>
    	<h2>Edit</h2>
    	<form method="post" action="update.php?id=<?php echo $id; ?>">
    		Competition:
            <br><br>
            <input type="text" value="<?php echo $row['comp_name']; ?>" name="comp_name">
            <br><br>
    		<input type="submit" name="Update" value="Update">
            <br><br>
    		<a href="competition.php">Back</a>
    	</form>
    </body>
    </html>