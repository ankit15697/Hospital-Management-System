<?php
session_start();


//include funtion.php file
require('function.php');
$con = con();
$desease = validate($_POST["search"]);
/*$ce = validate($_POST["sub"]);*/



//QUERY TO FETCH ALL details of candidates

$detail = "SELECT * FROM Doctors where desease='$desease'";
$result = $con->query($detail);

?>



<!DOCTYPE html>
<html>
 <head>
   <title> Search_Back Page </title>
   <link rel="shortcut icon" href="img/01.jpeg" />
   <link  href="css/search_back.css" rel="stylesheet"/>
 </head>
 <body>
  <div id="full">
    <div id="header">
      <div id="lg">
         <h1 style="color:white;"> MNNIT HEALTH </h1>
      </div>
      <div id="li">
       <a href="index.php"> Home &nbsp;&nbsp;</a>
        <a href="search.php"> Seach&nbsp;&nbsp;</a>
        <a href="book.php"> Book &nbsp;&nbsp;</a>
        <a href="login.php"> Member Login&nbsp;&nbsp;</a>
        <a href="about.php"> ABOUT  </a>
       </div>
      </div>
      <div id="admin">
           <?php
            $a=0;
            echo "<center><table>";
            echo "<tr ><th>Name</th><th>Phone Number</th><th>Email</th><th>Address</th><th>Speciliest</th><th>Book</th></tr>";
            while($row=$result->fetch_array())
                 {
                     $a=1;
                     echo "<tr><form action='book.php' method='post'><td>Dr. $row[2] $row[3] $row[4]</td><td>$row[6]</td><td>$row[5]</td><td>$row[7]<br>$row[8]<br>$row[9]</td><td>$row[10]</td><td><input type='submit' name='book' value='Book'/>
             </td></form></tr>";
                 }
                echo "</table></center>";
              if($a==0)
                echo "<center>No Data found releated to this desease found search again </center> <form action='search.php' method='post'>  <center><input type='submit' value='Search Again' name='sub'/></center></form>";
           ?>
       </div>
    <div id="abo">
    <p style="color:black"> &copy;  2018</p>
    </div>
  </div>
 </body>
</html> 
