<?php
require('db.php');
echo $_GET["title"];
$title = $_GET["title"];
$query = "SELECT * FROM public.project WHERE title = '$title' ";
            $result = pg_query($dbconn,$query) or die(pg_last_error($dbconn));
            $arr = pg_fetch_array($result, NULL,PGSQL_ASSOC);
            $rows = pg_num_rows($result);

$current_value_query = "SELECT SUM(amount) FROM public.backing WHERE backed_for = '$title'";
$current_value = pg_query($dbconn, $query) or die(pg_last_error($dbconn));


if ($rows > 0){
	echo '<div><a href = 'back_project.php?title=".$title."'></a></div>'

	echo '<h3>' . $title . '</h3>';
	echo'<div>
				<p>' . $arr['title'] . '</p>
				<p>' . $arr['descripton'] . '</p>
				<p>' . $arr['start_date'] . '</p>
				<p>' . $arr['end_date'] . '</p>
				<p>' . $arr['categories'] . '</p>
				<p>' . $arr['target_amount'] . '</p>
				<p>' . $arr['created_by'] . '</p>
				<p>' . $current_value . '</p>
				
			</div>';
}
?>