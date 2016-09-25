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
    require('db.php');
    // If form submitted, insert values into the database.
    if (isset($_POST['project_title'])){
        $project_title = $_POST['project_title'];
        $description = $_POST['description'];
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];
        $categories = $_POST['categories'];
        $target_amount = $_POST['target_amount'];
        
        $project_title = stripslashes($project_title);
        $project_title = pg_escape_string($dbconn,$project_title);
        $description = stripslashes($description);
        $description = pg_escape_string($dbconn,$description);
        $start_date = stripslashes($start_date);
        $start_date = pg_escape_string($dbconn,$start_date);
        $end_date = stripslashes($end_date);
        $end_date = pg_escape_string($dbconn,$end_date);
        $categories = stripslashes($categories);
        $categories = pg_escape_string($dbconn,$categories);
        $target_amount = stripslashes($target_amount);
        $target_amount = pg_escape_string($dbconn,$target_amount);
        $created_by = $email;
        
        $query = "INSERT into public.project 
        (title, description, start_date, end_date, categories, target_amount, created_by) 
        VALUES ('$project_title', '$description', '$start_date', '$end_date', '$categories', '$target_amount', '$created_by')";
        $result = pg_query($dbconn,$query) or die('Query failed: ' . pg_last_error());
        if($result){
            echo "<div class='form'><h3>Your project is are created.</h3><br/>Click here to view<a href='projects.php'>Your Project</a></div>";
        }
    } else {
?>


<div class="form" align="center">
<h3>Create Project</h3>
<form name="create_project" action="" method="post">
<input type="text" name="project_title" placeholder="Project Title" required /><br>
<input type="text" name="description" placeholder="Description" required /><br>
<input type="date" name="start_date" placeholder="Start Date: DD/MM/YY" required /><br>
<input type="date" name="end_date" placeholder="End Date: DD/MM/YY" required /><br>
<input type="text" name="categories" placeholder="Category" required /><br>
<input type="text" name="target_amount" placeholder="$ Target Amount" required /><br>



<input class="submit" type="submit" name="submit" />
</form>
</div>
<?php } ?>
</body>

</html>