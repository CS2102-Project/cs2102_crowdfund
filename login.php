<?php
/*
Author: Shi Tianyuan

*/
session_start();
?>
<!DOCTYPE html>
<html>
<?php
include('includes/header_login.html');
?>
<link href="css/blurimage.css" rel="stylesheet">
<style type="text/css">
h1{padding-left: 100px;color: #7F345A;margin-top: 10px;}
    
    footer {height:50px;width:100%;text-align: center;float: left;color: #2C3E50;text-align: center;vertical-align: baseline;}

    .upper{
      height: 350px;
      width: 93%;
      margin-left: 60px;
      margin-right: 40px;
      margin-top: 10px;
      float: left;
      
      padding: 2px;
      
     
    }

    .form{
      width: 300px;
      height: 320px;
      
      float: right;
      margin-right: 100px;
      margin-top: 10px;
      outline-color: #7F8C8D;
      outline-style: solid;
      
      }


    .form>h3 {padding-left: 20px;color: #34495E;text-align: left;padding-bottom: 20px;}
    form{padding-left: 20px;padding-bottom: 40px;color: #2c3e50;}
    form>p>a{text-align: left;font-size: 14px;color:#2C3E50; }

    input.submit{background-color: #7F345A;color:white;margin-top: 40px;}
    input{color: black;}

    .contentbox{
       
      width: 70%;
      height: 320px;
      
      float: left;
      margin-right: 100px;
      margin-top: 10px;
      outline-color: #7F8C8D;
      outline-style: solid;
      
      }
      .contentbox #imagebox{height: 280px;float: left;width: auto;}
      .contentbox #textbox{height: 280px;float: left;width: 300px;text-align: justify;padding-top: 20px;padding-left: 40px;margin-left: 200px   }

    

      .lower{
        width: 90%;
        height: 350px;
        float: left;
        margin-left: 60px;
        
        margin-right: 100px;
        margin-bottom: 20px; 
        outline-color: #7F8C8D;
        outline-style: solid;
      }
          
          .lower #box1{
            width: 30%;
            height: 300px;
            float: left;
            outline-color: #7F8C8D;
            outline-style: solid;

          }
          .lower #box1>#titlebox{
            background-color: white;
            width:120px;
            text-align: center;
            margin-left:100px;
            font-size: 30px;
          }
          
          .lower #box2{
            width: 30%;
            height: 300px;
            float: left;
            outline-color: #7F8C8D;
            outline-style: solid;
            
         
          }
          .lower #box2>#titlebox{
            background-color: white;
            width:120px;
            text-align: center;
            margin-left:100px;
            font-size: 30px;
          }

          .lower #box3{
            width: 30%;
            height: 300px;
            float: left;
            outline-color: #7F8C8D;
            outline-style: solid;
           }
           .lower #box3>#titlebox{
            background-color: white;
            width:120px;
            text-align: center;
            margin-left:100px;
            font-size: 30px;}


html {
    position: relative;
    min-height: 100%;
}
   .form{background: #FFB6C1;}
   
   body{margin: 0 0 100px;
    background-repeat:no-repeat;
    background-size: 100%; 
   }
   footer {
    position: absolute;
    left: 0;
    bottom: 0;
    height: 100px;
    width: 100%;

}
img#topimg{margin-left: 50px;height: 280px;width:auto;padding-top: 15px;}

</style>
<body >
<?php
  require('db.php');
  
    // If form submitted, insert values into the database.
    if (isset($_POST['username'])){
        $username = $_POST['username'];
        $pass = $_POST['pass'];
    $username = stripslashes($username);
    $username = pg_escape_string($dbconn,$username);
    $pass = stripslashes($pass);
    $pass = pg_escape_string($dbconn,$pass);

  //Checking is user existing in the database or not
        $query = "SELECT * FROM public.user WHERE username='$username' and pass='".md5($pass)."'";
    $result = pg_query($dbconn,$query) or die(pg_last_error($dbconn));
    $rows = pg_num_rows($result);
        if($rows==1){
   
         
          $_SESSION['username'] = $username;
            $query = "SELECT email FROM public.user WHERE username = '$username'";
            $result = pg_query($dbconn,$query) or die(pg_last_error($dbconn));
            $rows = pg_fetch_array($result, NULL,PGSQL_ASSOC);
            $_SESSION['email'] = $rows["email"];
            if(isset($_SESSION['email'])){echo "You have logged in successfully, click<a href = 'index.php'> here</a> to go to your homepage";}
            else echo"fail";

            header("Location: index.php"); // Redirect user to index.php

        }else{
        echo "<div class='form12'><h3>Username/password is incorrect.</h3><br/>Click here to <a href='login.php'>Login</a></div>";
        }
    }else{
?>
<h1>Welcome to eCrowd</h1>


<div class = "upper">

<div class = "contentbox">
        
        <div id = "imagebox">
        Image here
          <!--<img src="img/bg.png" class="img-rounded img-responsive" id = "topimg">-->
          
          </div>




        <div id = "textbox">
             <h5>About</h5>
              <p>
Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec ullamcorper nulla non metus auctor fringilla. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.
                </p>
          </div>
  </div>
<div class="form">
<h3>Log In</h3>
<form action="" method="post" name="login">

<input type="text" name="username" size="28" placeholder="Username" required /><br>
<input class="password" type="password" size="28" name="pass" placeholder="Password" required /><br>
<p><a href='registration.php'>Register Here</a></p>
<input class="submit" name="submit" type="submit" value="Login" />

</form>
</div>
</div>
<style>
    

  img.img-rounded.img-responsive{margin-left: 100px;height: 240px;width:auto;padding-top: 35px;}
</style>
<div class = "lower">
    
    <div id = "box1">
        <div id = "titlebox">Title1</div>
        <br><br>
        Image or Content here
    </div>


    <div id = "box2">
        <div id = "titlebox">Title2</div>
        <br><br>
        Image or Content here
    </div>


    <div id = "box3">
        <div id = "titlebox">Title3</div>
        <br><br>
        Image or Content here
    </div>


</div>
    







    <?php } ?>

    <!--<img src="media/blackboard.png" align = "centre">-->
    <?php

include('includes/footer.html');
?>
</body>


</html>
