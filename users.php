<!DOCTYPE html>
<html>
<head>
    <title> Crowdfunding | Projects </title>
</head>
<body>
<h1>All Projects</h1>

<?php
$dbconn = pg_connect("host=localhost port=5432 dbname=crowdfund_development user=postgres password=Aa458545147")
    or die('Could not connect: ' . pg_last_error());
?>

<?php
$query = 'SELECT * FROM user' or die('Query failed: ' . pg_last_error());
$result = pg_query($dbconn, $query);

echo '<div> email </div>';
while ($arr = pg_fetch_array($result, NULL, PGSQL_ASSOC)) {
    echo "<div>" . $arr["email"] . " </div>";
}

pg_free_result($result);
?>

</body>
</html>

