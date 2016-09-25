<?php
require('db.php');

$title = $_GET["title"];
$query = "SELECT * FROM public.project WHERE title = '$title' ";
            $result = pg_query($dbconn,$query) or die(pg_last_error($dbconn));
            $arr = pg_fetch_array($result, NULL,PGSQL_ASSOC);
            $rows = pg_num_rows($result);
           
$current_value_query = "SELECT SUM(amount) AS total FROM public.backing WHERE backed_for = '$title'";
$current_value_result = pg_query($dbconn, $current_value_query) or die(pg_last_error($dbconn));

$current_value_arr = pg_fetch_array($current_value_result, NULL,PGSQL_ASSOC);
$current_value = $current_value_arr['total'];

if ($rows > 0){
	 echo "<div><a href = 'back_project.php?title=".$title." '>Back This Project</a></div>";
	echo '<h3>' . $title . '</h3>';
	echo'<div>
				
				<p> Description: ' . $arr['descripton'] . '</p>
				<p> Start Date: ' . $arr['start_date'] . '</p>
				<p> End Date: ' . $arr['end_date'] . '</p>
				<p> Categories: ' . $arr['categories'] . '</p>
				<p> Target Amount: $' . $arr['target_amount'] . '</p>
				<p> Created By: ' . $arr['created_by'] . '</p>
				<p> Current Value: ' . $current_value . '</p>
				
			</div>';
}
?>