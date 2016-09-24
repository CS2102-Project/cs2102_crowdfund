<!DOCTYPE html>
<html>
<head>
<style type="text/css">
	h3{margin-left: 240px;}
	p{margin-left:240px; }
	p>em{text-align: top;}
	textarea{margin-left: 10px;}
	input.submit{background-color: #34495E;
		color:#1ABC9C;
		margin-left: 300px;
		margin-top: 20px;
		margin-bottom: 40px;
		width: 150px;
		text-align: center;

	}
</style>
<?php # Script 17.6 - post_form.php
// This page shows the form for posting messages.
// It's included by other pages, never called directly.

// Redirect if this page is called directly:
error_reporting(E_ALL ^ E_NOTICE);
// Only display this form if the user is logged in:
session_start();
if (isset($_SESSION['user_id'])) {

	// Display the form:
	echo '<form action="post.php" method="post" accept-charset="utf-8">';
	
	// If on read.php...
	if (isset($tid) && $tid) {

		// Print a caption:
		echo '<h3>Please Post Your Reply Below</h3>';
	
		// Add the thread ID as a hidden input:
		echo '<input name="tid" type="hidden" value="' . $tid . '" />';
		
	} else { // New thread

		// Print a caption:
		echo '<h3>new_thread</h3>';
	
		// Create subject input:
		echo '<p><em>subject</em>: <input name="subject" type="text" size="60" maxlength="100" ';

		// Check for existing value:
		if (isset($subject)) {
			echo "value=\"$subject\" ";
		}
	
		echo '/></p>';
	
	} // End of $tid IF.
	
	// Create the body textarea:
	echo '<p><em>Reply</em>: <textarea name="body" rows="10" cols="51">';

	if (isset($body)) {
		echo $body;
	}

	echo '</textarea></p>';
	
	// Finish the form:
	echo '<input class="submit" name="submit" type="submit" value="submit" />
	</form>';
	
} else {
	echo '<p>You must be logged in to post messages.</p>';
}

?>
</head>
<body>

</body>
</html>
