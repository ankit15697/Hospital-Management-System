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
 $pass=validate($_POST["pwd"]);
 
 $con=con();
 
 if($fname==NULL)
  {
	echo "<script>alert('name must be field.');window.location='dupdate.php';</script>";
	die(); 

  }
   if($pass==NULL)
  {
	echo "<script>alert('Password filed can not be empty.');window.location='dupdate.php';</script>";
	die(); 

  }
  
  if($user_id==NULL)
  {
	echo "<script>alert('User id must be field.');window.location='dupdate.php';</script>";
	die(); 

  }
  
  if($email_id==NULL)
  {
	echo "<script>alert('Email id must be field.');window.location='dupdate.php';</script>";
	die(); 

  }
  
  if($mno==NULL)
  {
	echo "<script>alert('Mobile  must be field.');window.location='dupdate.php';</script>";
	die(); 

  }
  if($desease=="Choice")
  {
	echo "<script>alert('Desease  must be selected.');window.location='dupdate.php';</script>";
	die(); 

  }
  
  if($add1==NULL)
  {
	echo "<script>alert('Address  must be given.');window.location='dupdate.php';</script>";
	die(); 

  }
  
 $query = "UPDATE Doctors SET pwd='$pass',first_name='$fname',middle_name='$mname',last_name='$lname',email='$email_id',mob='$mno',address_line1=' $add1',address_line2=' $add2',address_line3=' $add3',desease='$desease' WHERE user_id='$user_id'";
    
    $result = $con->query($query);
    if($result)
     echo "<script>alert('successfully updated.');window.location='doctor_home.php';</script>";
    else
      echo "<script>alert('Something went wrong.');window.location='doctor_home.php';</script>";
?>

