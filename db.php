<?php
$dbconn = pg_connect("host=localhost port=5432 dbname=crowdfund_development user=postgres password=@42cNa4h")
    or die('Could not connect: ' . pg_last_error());
?>
