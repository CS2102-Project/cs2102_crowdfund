<?php
/*
Author: Shi Tianyuan

*/
?>

<?php
session_start();
if(session_destroy()) // Destroying All Sessions
{
header("Location: login.php"); // Redirecting To Home Page
}
?>