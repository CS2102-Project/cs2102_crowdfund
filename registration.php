

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Registration</title>
<link rel="stylesheet" href="css/style.css" />
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
	require('db.php');
    // If form submitted, insert values into the database.
    if (isset($_POST['username'])){
        $username = $_POST['username'];
		$email = $_POST['email'];
        $pass = $_POST['pass'];
		$username = stripslashes($username);
		$username = pg_escape_string($conn,$username);
		$email = stripslashes($email);
		$email = pg_escape_string($conn,$email);
		$pass = stripslashes($pass);
		$pass = pg_escape_string($conn,$pass);
		
        $query = "INSERT into users (username, pass, email) VALUES ('$username', '".md5($pass)."', '$email')";
        $result = pg_query($conn,$query);
        if($result){
            echo "<div class='form'><h3>You are registered successfully.</h3><br/>Click here to <a href='login.php'>Login</a></div>";
        }
    }else{
?>
<div class="form" align="center">
<h3>Registration</h3>
<form name="registration" action="" method="post">
<input type="text" name="username" placeholder="Username" required /><br>
<input type="email" name="email" placeholder="Email" required /><br>
<input type="password" name="pass" placeholder="Password" required /><br>
<input class="submit" type="submit" name="submit" value="Register" />
</form>
</div>
<?php } ?>
</body>
<?php
include("includes/footer.html");
?>
</html>
