<?php
 session_start();
 require('function.php');
 $fname = validate($_POST["fname"]);
 $mname = validate($_POST["mname"]);
 $lname = validate($_POST["lname"]);
 $user_id = validate($_POST["user_id"]);
 $email_id = validate($_POST["email_id"]);
 $mno = validate($_POST["mno"]);
 $desease = validate($_POST["search"]);
 $add1 = validate($_POST["add1"]);
 $add2 = validate($_POST["add2"]);
 $add3 = validate($_POST["add3"]);
 $date1 = date("d/m/Y");
 
 $con=con();
 
 if($fname==NULL)
  {
	echo "<script>alert('name must be field.');window.location='book.php';</script>";
	die(); 

  }
  
  if($user_id==NULL)
  {
	echo "<script>alert('User id must be field.');window.location='book.php';</script>";
	die(); 

  }
  
  if($email_id==NULL)
  {
	echo "<script>alert('Email id must be field.');window.location='book.php';</script>";
	die(); 

  }
  
  if($mno==NULL)
  {
	echo "<script>alert('Mobile  must be field.');window.location='book.php';</script>";
	die(); 

  }
  if($desease=="Choice")
  {
	echo "<script>alert('Desease  must be selected.');window.location='book.php';</script>";
	die(); 

  }
  
  if($add1==NULL)
  {
	echo "<script>alert('Address  must be given.');window.location='book.php';</script>";
	die(); 

  }
  
  $query="select *from Customers C where C.user_id='$user_id'";
  $result=$con->query($query);
  if($result->num_rows>0)
   {
     echo "<script>alert('User with this user id is exist.');window.location='book.php';</script>";
        die();
   }
   else
    {
     $ins_query="insert into Customers values('$user_id','$fname','$mname','$lname','$email_id','$mno','$add1','$add2','$add3','$desease')";
     $ins_result=$con->query($ins_query);
     $detail = "SELECT * FROM Doctors where desease='$desease'";
     $r=$con->query( $detail);
      if($r->num_rows<=0)
      {
          echo "<script>alert('No Doctor exists for this disease.');window.location='book.php';</script>";
         die();
       }
     $a=$r->fetch_array();
     $ins1_query="insert into Appointments values('$a[0]','$user_id','$date1')";
     $ins1_result=$con->query($ins1_query);
     if($ins1_result>=1)
      echo "<script>alert('Successfully Ticket Booked.');</script>";
     else
      {
        echo"<script> alert('Something Went Wrong');window.location='book.php';</script>";
        die(); 
      }
     
     $dfname = $a[2]; 
     $dmname = $a[3];
     $dlname = $a[4];
     $demail = $a[5];
     $dmno = $a[6];
     
    }
?>


<!DOCTYPE html>
<html>
  <head>
    <title> Print Page </title>
     <center><h2> MNNIT HEALTH CENTER </h2><center>
    <link rel="shortcut icon" href="img/01.jpeg" />
   <link  href="css/book_back.css" rel="stylesheet"/>
   <script>
document.getElementById("d").innerHTML = Date();
function pr() {
    window.print();
}
</script>
  </head>
  <body>
     <div id="d">
     </div> 
     <script>
document.getElementById("d").innerHTML = Date();
</script>
<hr/>
<br/> 
      <center><h4> Doctor Details </h4> </center>
      <center> <table>
          <tr>
              <th> Dr. Name </th>
              <td>  <?php echo " Dr. $dfname $dmname $dlname" ?> </td>
          </tr>
          <tr>
              <th> Mobile No </th>
              <td>  <?php echo " $dmno" ?> </td>
          </tr>
          <tr>
              <th> Email Id </th>
              <td>  <?php echo " $demail" ?> </td>
          </tr>
      </table>
      </center>
      <br/>
      <hr/>
      <center><h4> Your Details</h4> </center>
      <center>
      <table>
         <tr>
            <th> Name </th>
            <td> <?php echo " $fname $mname $lname" ?> </td>
         </tr>
         <tr>
            <th> Identification </th>
            <td> <?php echo " $user_id" ?> </td>
         </tr>
         <tr>
            <th> Email ID </th>
            <td> <?php echo " $email_id" ?> </td>
         </tr>
         <tr>
            <th> Mobile No </th>
            <td> <?php echo " $mno" ?> </td>
         </tr>
         <tr>
            <th> Desease </th>
            <td> <?php echo " $desease" ?> </td>
         </tr>
         <tr>
            <th> Address </th>
            <td> <?php echo " $add1 $add2 $add3" ?> </td>
         </tr>
         <tr>
            <th> Appointment Date </th>
            <td> Your Appointment confirmed tomorrow </td>
         </tr>
         <tr>
            <th> Time </th>
            <td> 10 AM </td>
         </tr>
      </table>
      </center>
      <br/>
      <hr/>
      <center><div id="bu">
      <form action="index.php">
		<input type="button" id="p" value="print" onclick="pr()">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" id="p" value="Go to Home page">
	</form>
	</div>
	</center>
  </body>
</html>
