<?php include "db.php";

if(isset($_POST['submit'])){
        $fixture_date = $_POST['fixture_date'];
        $fixture_time = $_POST['fixture_time'];
        $home_teamID = $_POST['home_teamID'];
        $away_teamID = $_POST['away_teamID'];
        $comp_id = $_POST['comp_id'];
        $team_id = $_POST['team_id'];
        $Email = $_POST['Email'];
        $team_name = $_POST['team_name'];
        $fullname = $_POST['fullname'];
        $goals_scored = $_POST['goals_scored'];
    if($connection){
        echo "";
    } else {

       die("Unable to Capture Data");
    }
    $query = "INSERT INTO  Reports (fixture_date, fixture_time, home_teamID, away_teamID, comp_id, team_id, Email, team_name, fullname, goals_scored) VALUE ('$fixture_date', $fixture_time, $home_teamID, $away_teamID, $comp_id, $team_id, $Email, $team_name, $fullname, $goals_scored)";
            $result = mysqli_query($connection, $query);
            exit();
        if(!$result){
       die('Failed' .  mysqli_error());
    }
}
?>