<?php
//https://www.sitepoint.com/community/t/using-session-variables-to-keep-user-logged-in-if-they-havent-logged-out/294407
ob_start();
session_start();
include 'db.php';
if(isset($_POST['passchange'])){
	$oldpass = $_POST['oldpass'];
	 $newpass = $_POST['newpass'];
	 $cnewpass = $_POST['cnewpass'];
	
	if($oldpass =='' || $newpass == ''|| $cnewpass==''){
	echo '<p class="cpass">All the fields are required</p>'; 
	}else{
		$sql =mysqli_query( $con,"SELECT * FROM userdetails where contact_id= '".$_SESSION['contact_id']."'");

        if(mysqli_num_rows($sql) == 1) {
	 $member = mysqli_fetch_assoc($sql);
		
	 if($member['password']!=$oldpass){
		echo '<p class="cpass">your old password is invalid</p>';
	 } 
	 else
		if($newpass!= $cnewpass){
		echo '<p class="cpass">Your passwords do not match</p>';
	}else {
		$query = mysql_query("update userdetails set password='$newpass' where contact_id= '".$_SESSION['contact_id']."'");
		if($query){
			echo '<p class="cpasssuc">Password updated</p>';
		}else{
			echo 'error';
		}
	}
		
}// end num rowns

	
	}/// end empty fields
	}

?>
<html>
<head>
<title>Phone Book</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
 <div id="main">
 <h1> Phone Book</h1>
 <?php  include_once 'menu-main.php';?></div><br><br>
  

  <form class="passbox" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
  <h1> Change Password</h1>
   
<lable>Old Password<span style="color:red">*</span></lable> <input type="text" name ="oldpass" >
<lable>New Password<span style="color:red">*</span></lable> <input type="password" name="newpass" >
<lable>Confirm New Password<span style="color:red">*</span></lable> <input type="password" name="cnewpass" >
  <input type="submit" value ="Change" name="passchange">
  

  </form>

</body>
</html>