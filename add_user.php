<?php
include 'db.php';
if(isset($_POST['submit'])){
	$fname = $_POST['fname'];
	$dob = $_POST['dob'];
	$phone = $_POST['phone'];
	$Email = $_POST['Email'];
	if($fname == ''  || $phone ==''  ){
		echo '<p class="addusererror">Fields marked with * are required</p>';
	} else {
		$sql = "INSERT INTO contactdetails(contact_name,Date_of_Birth,phone,email) VALUES ('$fname','$dob','$phone', '$Email')";

$result= mysqli_query($con,$sql);
		if($result){
	   echo '<p class="addsucces">Record added successfully</p><br> ';
   }else {
	 echo '<p class="aderrorMsg">There was error while adding record</p>';  
   
	}	
}
}
?>


<html>
<head>
<title>Phone Book</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div id= "main">
 
  <h1> Phone Book</h1>
<?php  include 'menu-main.php';?></div>
  <form class="addusrbox" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
  <h1> Add New Contact</h1>
 <label>Name<span style="color:red;">*</span></label> <input type="text" name ="fname" placeholder ="Enter Name" ><br>
 <label>DOB</label> <input type="text" name ="dob" placeholder="YYYY/MM/DD"><br>
 <label>Phone<span style="color:red;">*</span></label> <input type="text" name="phone" placeholder="+91 XXXXXXXXXX" ><br>
 <label>Email</label> <input type="text" name="Email" placeholder="abc@gmail.com"><br>
 
 
  <input type="submit" value ="Save" name="submit">
  


  </form>

</body>
</html>