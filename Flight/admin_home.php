<?php 
@include 'config.php';
session_start();

echo $_SESSION['admin_name'];

$a1 = $_SESSION['admin_name'];

$query = "select * from train";
$result = mysqli_query($conn,$query);


if(isset($_POST['book'])){

  $id = $_POST['fidforsearch'];
$query = "DELETE FROM `train` WHERE `flightno` = '$id'";
$result1 = mysqli_query($conn,$query);

}

if(isset($_POST['yourbooking']))
{
  header('location:admin_add.php');

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="bootstrap.min.css">
  <link rel="stylesheet" href="style1.css">
  
  <title>Fatech Data From Database in Php</title>
</head>
<body class="bg-dark">
    <div class="welcome">
        <h1>Welcome <span class="span"><?php echo $a1 ?></span> </h1>
    </div>
    <form action="" method="post">
<div class="bookings">
      <input type="submit" value="Add Train" class ="span1" name="yourbooking" >
    </div>
</form>

    <div class="container">
      <div class="row mt-5">
        <div class="col">
          <div class="card mt-5">
            <div class="card-header">
              <h2 class="display-6 text-center">Flight Details</h2>
            </div>
            <div class="card-body">
              <table class="table table-bordered text-center">
                <tr class="bg-dark text-white">
                  <td> Flight Name </td>
                  <td> Flight No </td>
                  <td> Departure </td>
                  <td> Destination </td>
                  <td> Departure Time </td>
                  <td> Arrival Time </td>
                  <td>Fare</td>
                </tr>
                <tr>
                <?php 

                  while($row = mysqli_fetch_assoc($result))
                  {
                ?>
                  <td><?php echo $row['name']; ?></td>
                  <td><?php echo $row['flightno']; ?></td>
                  <td><?php echo $row['start']; ?></td>
                  <td><?php echo $row['end']; ?></td>
                  <td><?php echo $row['starttime']; ?></td>
                  <td><?php echo $row['endtime']; ?></td>
                  <td><?php echo $row['fare']; ?></td>
             
                </tr>
                <?php    
                  }
                
                ?>
                
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    <form action="" method="post">
    <div class="search1">
      <input type="text" name="fidforsearch"  placeholder="Enter Flight id to remove" class="search">
      <input type="submit" name="book" value="Remove" class="book">
    </div>
    </form>
   

    <div class="content1">
<a href="logout.php" class="btn">logout</a>

</div>
     
</body>
<script>
function myFunction() {
  document.getElementById("demo").style.color = "red";
}
</script>
</html>