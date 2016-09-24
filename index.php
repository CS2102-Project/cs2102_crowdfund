
<?php include("auth.php");  //include auth.php file on all secure pages ?>
<!DOCTYPE html>
<html>
<?php
//FLAG AUTHENTIFICATION
require('db.php');
?>
<?php
include('includes/header_user.html');
?>

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
<body>


<div id = "nav"  align="left">
<p class="read">Welcome <?php echo $_SESSION['username']; ?>!</p>
<p class="read">This is your home page.<br><br>
<div class = "lower">
    
    <div id = "box1">
        <div id = "titlebox">PART1</div>
       <p>Press <a href="logout.php"> here</a> to log out</p>
    </div>


    <div id = "box2">
        <div id = "titlebox">PART1</div>
        
    </div>


    <div id = "box3">
        <div id = "titlebox">PART1</div>
       
    </div>


</div>
</div>
<div id = "bod">
</body>
<?php
include('includes/footer.html');
?>
</html>
