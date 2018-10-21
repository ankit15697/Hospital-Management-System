<?php
  session_start();
  require('function.php');
  $con=con();
  if(isset($_SESSION['user_id']))
   {
     $id=$_SESSION['user_id'];
   }
   else
    {
      header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/index.php");
      exit();
    }
    $a;
    $user = $_POST["user_id"];
    $userid = $_SESSION['user_id'];
?>


<!DOCTYPE html>
<html>
 <head>
   <title> Doctor Home Page </title>
   <link rel="shortcut icon" href="img/01.jpeg" />
   <link  href="css/doctor_home.css" rel="stylesheet"/>
 </head>
 <body>
  <div id="full">
    <div id="header">
      <div id="lg">
         <h1 style="color:white;"> MNNIT HEALTH</h1>
      </div>
      <div id="li">
        <a href="doctor_home.php"> Home  &nbsp;&nbsp;</a>
        <a href="dupdate.php"> Update Details &nbsp;&nbsp;</a>
        <a href="logout.php"> Logout </a>
      </div>
    </div>
    <div id="ma">
      <marquee> <h1 style="color:white;"> Welcome <?php echo "$userid";?> </h1></marquee>
    </div>
    <div id="fo">
         <center> <h3 style="color:red;opacity:1;"> Search Patient By date </h3></center>
         <center><form action="doctor_search.php" method="post">
           <input type="text" name ="da" vale="date" placeholder="dd/mm/yyyy"/>
            <br/>
            <br/>
           <input type="submit" name="sub" value"Search" />
         </form>
         </center>
    </div>
    <div id="abo">
    <p style="color:black"> &copy;  2018</p>
    </div>
  </div>
 </body>
</html>
