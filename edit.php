<?php

 ob_start();
include 'db.php';
  
   // $getid = $_GET['editid'];
$getid = $_GET['editid']; // GETTING ID FROM URL
   $query = "SELECT * FROM contactdetails WHERE contact_id ='$getid' ";
    $result = mysqli_query($con,$query);
	 $row = @mysqli_fetch_assoc($result);
	// echo $row['contact_name'];
   // update
   if(isset($_POST['update1'])){
	    $getid = $_GET['editid'];
	   $fname = $_POST['fname'];
	   $dob = $_POST['dob'];
	   $phone = $_POST['phone'];
	   $Email = $_POST['Email'];
   $qu = ("UPDATE contactdetails SET contact_name='$fname', Date_of_Birth= '$dob',phone= '$phone',email='$Email' 
   WHERE contact_id ='$getid'");
    $run_query =@mysqli_query($con,$qu);
	if($run_query){
	header("Location:view_user.php");	
  
   }else  {
	 echo '<p class="errorMsg">There was error while updating record</p>';  
   
	}
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
 <?php  include 'menu-main.php';?></div>
 <form class="addusrbox" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
  <h1> Update User</h1>
  <input type="hidden" name ="contact_id" value="<?php echo $row['contact_id'];?>"><br>
 <label>Name</label> <input type="text" name ="fname" value="<?php echo $row['contact_name'];?>"><br>
 <label>DOB</label> <input type="text" name ="dob" value=""><br>
 <label>Phone</label> <input type="text" name="phone" value=""><br>
	<label>Email</label> <input type="text" name="Email" value=""><br>
 
 
  <input type="submit" value ="Update" name="update1">
  
  

  </form>
  
  </body>
  </html>
  