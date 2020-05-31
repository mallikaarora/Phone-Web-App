<?php
session_start();
//echo $_SESSION['username'];
?>
<html>
<head>
<title>Phone Book</title>
<link rel="stylesheet" href="style.css">
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<script>
   function ConfirmDelete() {
  return confirm("Do you want to delete?");
}
</script>
</head>
<body>
<div id = "main">
  <h1> Phone Book</h1>
  
  <?php  include 'menu-main.php';?><br><br>
  
   <table class=" viewtabl" >
  <th>
  <tr>
  <td> <strong>S.No</strong></td>
  <td><strong>Name</strong></td>
  <td><strong>Date Of Birth</strong></td>
  <td><strong>Phone</strong> <i class="fa fa-phone-square"> </i></td>
  <td><strong>Email</strong> <i class="fa fa-envelope"> </i></td>
  <td><strong></strong></td>
  </tr>
  </th>
  <?php  //https://www.formget.com/update-data-in-database-using-php/  to display table in echo https://stackoverflow.com/questions/35944425/displaying-a-user-profile-page-php
  include 'db.php';
   $count= 1;
   $query = "SELECT * FROM contactdetails ORDER BY contact_name";
    $result = mysqli_query($con,$query);
	 while($row = @mysqli_fetch_assoc($result)){?>
  
  
  <tr>
  <td id="od"> <?php echo $count;?></td>
  <td class="ev"> <?php echo $row["contact_name"];?></td>
  <td class="od"><?php echo $row["Date_of_Birth"];?></td>
  <td class="ev"><?php echo $row["phone"];?></td>
  <td class="od"><?php echo $row["email"];?></td>
  <td class="ev">
  <a href="delete.php?deleteid=<?php echo $row["contact_id"]; ?> "id="del" Onclick="return ConfirmDelete()"> Delete <i class='fas fa-trash'></i></a>
<br><br>
 <a href="edit.php?editid=<?php echo $row["contact_id"]; ?>"id="edt" > Edit <i class='far fa-edit style='font-size:24px'></i></a>
  </td>
  </tr>
 <?php $count++;}?>
	 </table>
	   
</div>
</body>

</html>

