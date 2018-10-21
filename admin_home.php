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
    $qu="select * from Doctors ";
    $result=$con->query($qu);
?>


<!DOCTYPE html>
<html>
 <head>
   <title> Admin Home Page </title>
   <link rel="shortcut icon" href="img/01.jpeg" />
   <link  href="css/admin_home.css" rel="stylesheet"/>
 </head>
 <body>
  <div id="full">
    <div id="header">
      <div id="lg">
         <h1 style="color:white;"> MNNIT HEALTH</h1>
      </div>
      <div id="li">
        <a href="admin_home.php"> Home &nbsp; </a>
        <a href="add.php"> Add Doctor &nbsp;</a>
        <a href="update.php"> Update Doctor &nbsp;</a>
        <a href="delete.php">  Delete Doctor &nbsp;</a>
        <a href="patient.php"> See Patient &nbsp;</a>
        <a href="logout.php"> Logout </a>
      </div>
    </div>
    <div id="ma">
      <marquee> <h1 style="color:red;"> Welcome <?php echo "$userid";?> Now You can Manage DATA</h1></marquee>
    </div>
    <div id="fo">
         <center> <h1 style="color:red;opacity:1;"> Available Doctors </h1></center>
          <?php
           echo "<center><table>";
           echo "<tr><th>Name</th><th>Email</th><th>Mobile</th><th>Address</th><th>Specilist</th></tr>";
           $a=0;
           while($row1=$result->fetch_array())
            {
              $a=1;
              echo "<tr><td>$row1[2] $row1[3] $row1[4]</td><td> $row1[5]</td><td> $row1[6]</td><td>$row1[7] $row1[8] $row1[9]</td><td>$row1[10]</td></tr>";
            }
            echo "</table></center>";
            if($a==0)
             {
               echo "No Doctor Available Please add more doctors";
             }
          ?>
         </center>
    </div>
    <div id="abo">
    <p style="color:black"> &copy;  2018</p>
    </div>
  </div>
 </body>
</html>
