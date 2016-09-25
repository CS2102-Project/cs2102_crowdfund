<?php
require('db.php');
echo $_GET["title"];
$title = $_GET["title"];
$query = "SELECT * FROM public.project WHERE title = '$title' ";
            $result = pg_query($dbconn,$query) or die(pg_last_error($dbconn));
            $arr = pg_fetch_array($result, NULL,PGSQL_ASSOC);
            $rows = pg_num_rows($result);
if ($rows > 0){

	echo '<table width="70%" border="0" cellspacing="2" cellpadding="2" align="center">
		<tr>
			<td align="left" width="5%"><em>title</em>:</td>
			<td align="left" width="5%"><em>descripton</em>:</td>
			<td align="left" width="5%"><em>startDate</em>:</td>
			<td align="left" width="5%"><em>endDate</em>:</td>
			<td align="left" width="5%"><em>categories</em>:</td>
			<td align="left" width="5%"><em>target_amount</em>:</td>
			<td align="left" width="5%"><em>created_by</em>:</td>
			<td align="left" width="5%"><em>current_value</em>:</td>
		</tr>';
	echo'<tr>
				<td align="left">' . $arr['title'] . '</td>
				<td align="left">' . $arr['descripton'] . '</td>
				<td align="left">' . $arr['startDate'] . '</td>
				<td align="left">' . $arr['endDate'] . '</td>
				<td align="left">' . $arr['categories'] . '</td>
				<td align="left">' . $arr['target_amount'] . '</td>
				<td align="left">' . $arr['created_by'] . '</td>
				<td align="left">' . $arr['current_value'] . '</td>
				
			</tr>';
}
?>