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
	echo "<script>alert('name must be field.');window.location='add.php';</script>";
	die(); 

  }
   if($pass==NULL)
  {
	echo "<script>alert('Password filed can not be empty.');window.location='add.php';</script>";
	die(); 

  }
  
  if($user_id==NULL)
  {
	echo "<script>alert('User id must be field.');window.location='add.php';</script>";
	die(); 

  }
  
  if($email_id==NULL)
  {
	echo "<script>alert('Email id must be field.');window.location='add.php';</script>";
	die(); 

  }
  
  if($mno==NULL)
  {
	echo "<script>alert('Mobile  must be field.');window.location='add.php';</script>";
	die(); 

  }
  if($desease=="Choice")
  {
	echo "<script>alert('Desease  must be selected.');window.location='add.php';</script>";
	die(); 

  }
  
  if($add1==NULL)
  {
	echo "<script>alert('Address  must be given.');window.location='add.php';</script>";
	die(); 

  }
  
  $query="select *from Doctors d where d.user_id='$user_id'";
  $result=$con->query($query);
  if($result->num_rows>0)
   {
     echo "<script>alert('Doctor with this user id already exits.');window.location='add.php';</script>";
        die();
   }
   else
    {
     $ins_query="insert into Doctors values('$user_id','$pass','$fname','$mname','$lname','$email_id','$mno','$add1','$add2','$add3','$desease')";
     $ins_result=$con->query($ins_query);
      echo "<script>alert('Data inserted Successfully.');window.location='admin_home.php';</script>";
    }
?>

