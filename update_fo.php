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
   $user_id = validate($_POST["id"]);
   $sq="select *from Doctors where user_id='$user_id'";
   $result=$con->query($sq);
   $row=$result->fetch_array();
   $fname=$row['first_name'];
   $mname=$row['middle_name'];
   $lname=$row['last_name'];
   $mno=$row['mob'];
   $email_id=$row['email'];
   $add1=$row['address_line1'];
?>


<!DOCTYPE html>
<html>
 <head>
   <title> Admin Add Doctor </title>
   <link rel="shortcut icon" href="img/01.jpeg" />
   <link  href="css/update_fo.css" rel="stylesheet"/>
   <script type="text/javascript" src="JS/ver.js"></script>
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
         <center> <h1 style="color:red;opacity:1;"> Update Doctor </h1></center>
         <center><h2 style="color:red;"> Fill the form </h2></center>
         <form  name="RegForm" action="update_back.php" onsubmit="return validate()" method="post">
           <center>
              <table>
                <tr>
                  <th> First Name </th>
                  <td> <input type="text" name="fname" placeholder="First Name" value=' <?php echo "$fname";?>' required/></td>
                </tr>
                <tr>
                  <th> Middle Name </th>
                  <td> <input type="text" name="mname" placeholder="Middle Name" value=' <?php echo "$mname";?>' /></td>
                </tr>
                <tr>
                  <th> Last Name </th>
                  <td> <input type="text" name="lname" placeholder="Last Name" value=' <?php echo "$lname";?>' /></td>
                </tr>
                <tr>
                  <th> User ID </th>
                  <td> <input type="text" name="user_id" placeholder="User Id" readonly value=' <?php echo "$user_id";?>'/></td>
                </tr>
                <tr>
                  <th> Password </th>
                  <td> <input type="password" name="pwd" placeholder="Password" required/></td>
                </tr>
                <tr>
                  <th> Email ID </th>
                  <td> <input type="email" name="email_id" placeholder="Email" value=' <?php echo "$email_id";?>' required/></td>
                </tr>
                <tr>
                  <th> Mo No. </th>
                  <td> <input type="text" name="mno" id="mo" placeholder="Mobile No." value=' <?php echo "$mno";?>' required/></td>
                </tr>
                <tr>
                 <th> Desease </th>
                 <td>
                   <select name="search">
		<option>Choice</option>
	 	<option>Acne</option>
	   	<option>Allergy</option>
		<option>Altitude sickness</option>
		<option>Asthma</option>
		<option>Back Pain</option>
		<option>Headache</option>
		<option>AIDS</option>
		<option>Hypertension</option>
		<option>Influenza</option>
		<option>diabetes</option>
		<option>Muscle Pain</option>
		<option>Cold fever</option>
		</select>
                 </td>
                </tr>
                <tr>
                  <th> Address Line1 </th>
                  <td> <input type="text" name="add1" placeholder="Address Line1" value=' <?php echo "$add1";?>' required/></td>
                </tr>
                <tr>
                  <th> Address Line2 </th>
                  <td> <input type="text" name="add2" placeholder="Address Line2"/></td>
                </tr>
                <tr>
                  <th> Address Line3 </th>
                  <td> <input type="text" name="add3" placeholder="Address Line3"/></td>
                </tr>
              </table>
             </center>
	  <center><input type='submit' name='sub' value='Submit'/></center>
          </form>
    </div>
    <div id="abo">
    <p style="color:black"> &copy;  2018</p>
    </div>
  </div>
 </body>
</html>
