<!DOCTYPE html>
<html>
<head>
    <title> Crowdfunding | Projects </title>
</head>
<body>
<h1>All Projects</h1>

<?php
 require('db.php');
  
?>

<?php
$query = 'SELECT * FROM project' or die('Query failed: ' . pg_last_error());
$result = pg_query($dbconn, $query);
/*
CREATE TABLE public.project (
  title VARCHAR(256) PRIMARY KEY,
  descripton VARCHAR(256),
  startDate DATE NOT NULL,
  duration INTEGER NOT NULL,
  categories VARCHAR(62) NOT NULL,
  target_amount INTEGER NOT NULL,
  created_by VARCHAR(256) REFERENCES public.user(email) ON DELETE CASCADE,
  current_value INTEGER DEFAULT 0
);

*/
echo '<p> Click <a href = "create_project.php"> here</a> to create a new project.</p>';

echo '<div> project title : target_amount </div>';
while ($arr = pg_fetch_array($result, NULL, PGSQL_ASSOC)) {
    echo "<div><a href = project_display.php>" . $arr["title"] . " : " . $arr["target_amount"] . "</a></div>";
}

pg_free_result($result);
?>

</body>
</html>

