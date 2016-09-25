<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>eCrowd | Create Project</title>

    <meta name="viewport" content="width=1000, initial-scale=1.0, maximum-scale=1.0">

    <!-- Loading Bootstrap -->
    <link href="dist/css/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/buttons.css" rel="stylesheet">

    <!-- Loading Flat UI -->
    <link href="dist/css/flat-ui.css" rel="stylesheet">
<style type="text/css">
input.submit{background-color: #34495E;
        color:#1ABC9C;
        
        margin-top: 20px;
        margin-bottom: 40px;
        width: 150px;
        text-align: center;
    }</style>
</head>
<body>
<?php
    session_start();
    $email = $_SESSION["email"];
    $title = $_GET["title"];
    require('db.php');
    // If form submitted, insert values into the database.
    if (isset($_POST['amount'])){
        $amount = $_POST['amount'];
        $amount = stripslashes($amount);
        $amount = pg_escape_string($dbconn,$amount);
       
        
        $query = "INSERT into public.backing 
        (backed_by, backed_for,amount) 
        VALUES ('$email','$title','$amount')";
        $result = pg_query($dbconn,$query) or die('Query failed: ' . pg_last_error());
        if($result){
            echo "<div class='form'><h3>You have successfully backed the projects.</h3><br/>Click here to view<a href='project_display.php?title=".$title."'> the project you donated in.</a></div>";
        }
    } else {
?>


<div class="form" align="center">
<h3>Create Project</h3>
<form name="create_back" action="" method="post">
<input type="number" name="amount" placeholder="Amount you want to donate" required /><br>



<input class="submit" type="submit" name="submit" />
</form>
</div>
<?php } ?>
</body>

</html>