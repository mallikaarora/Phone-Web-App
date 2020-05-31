<?php
include 'db.php';
if(isset($_POST['search']))
{
    $valueToSearch = $_POST['fname'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM contactdetails WHERE CONCAT(`contact_name`, `Date_of_Birth`, `phone`, `email`) LIKE '%".$valueToSearch."%'";

    
                 $search_result = filterTable($query);
}
 else {
    $query = "SELECT * FROM `contactdetails`";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "phonebook");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

?>

<!DOCTYPE html>
<html>
    <head>
       
        <link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
      <div id = "main">
  <h1> Phone Book</h1>
  
  <?php  include 'menu-main.php';?><br><br>
<div><form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
           
      <input type="text" name="fname" placeholder="Value To Search"><br>
            <input type="submit" name="search" value="Search"><br><br>
    </form>
 </div> 
   <table class=" viewtabl" >
  <th>
  <tr>
  <td><strong>Name</strong></td>
  <td><strong>Date Of Birth</strong></td>
  <td><strong>Phone</strong> <i class="fa fa-phone-square"> </i></td>
  <td><strong>Email</strong> <i class="fa fa-envelope"> </i></td>
  
  </tr>
  </th>
      <!-- populate table from mysql database -->
                <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                    <td><?php echo $row['contact_name'];?></td>
                    <td><?php echo $row['Date_of_Birth'];?></td>
                    <td><?php echo $row['phone'];?></td>
                    <td><?php echo $row['email'];?></td>
                </tr>
                <?php endwhile;?>
            </table>
        </form>
        
    </body>
</html>
