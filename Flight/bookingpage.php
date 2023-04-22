<?php 
@include 'config.php';
session_start();




$username =  $_SESSION['user_name'];
$flightno = $_SESSION['fid'];

if(isset($_POST['book']))
{
    $a = $_POST['fidforsearch'];
    $select = "delete FROM bookings WHERE id = '$a'";
$select = mysqli_query($conn, $select);

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
        <h1>Welcome <span class="span"><?php echo $_SESSION['user_name'] ?></span> </h1>
    </div>

    <div class="container">
      <div class="row mt-5">
        <div class="col">
          <div class="card mt-5">
            <div class="card-header">
              <h2 class="display-6 text-center">Your Bookings</h2>
            </div>
            <div class="card-body">
              <table class="table table-bordered text-center">
                <tr class="bg-dark text-white">
                <td> Booking Id </td>
                  <td> Train Name </td>
                  <td> Train No </td>
                  <td> Departure </td>
                  <td> Destination </td>
                  <td> No of tickets </td>
                  <td> Class </td>
                  
                </tr>
                <tr>
                <?php 
                


$username =  $_SESSION['user_name'];

$select = "SELECT * FROM register WHERE name = '$username'";
$select = mysqli_query($conn, $select);
$row = mysqli_fetch_assoc($select);

$fid= $row['id'];


$query = "select * from bookings where userid = '$fid'";
$result = mysqli_query($conn,$query);
$row1 = mysqli_fetch_assoc($result);

$flightno = $row1['flightid'];
$select = "SELECT * FROM train WHERE flightno = '$flightno'";
$select = mysqli_query($conn, $select);
// while($row2 = mysqli_fetch_assoc($select))

$query = "select * from bookings where userid = '$fid'";
$result = mysqli_query($conn,$query);

                  while($row1 = mysqli_fetch_assoc($result) )
                  {
                    $flightno = $row1['flightid'];
$select = "SELECT * FROM train WHERE flightno = '$flightno'";
$select = mysqli_query($conn, $select);

while($row2 = mysqli_fetch_assoc($select))
{

                ?>
                <td><?php echo $row1['id']; ?></td>
                  <td><?php echo $row2['name']; ?></td>
                  <td><?php echo $row2['flightno']; ?></td>
                  <td><?php echo $row2['start']; ?></td>
                  <td><?php echo $row2['end']; ?></td>
                  <td><?php echo $row1['no']; ?></td>
                  <td><?php echo $row1['class']; ?></td>
                </tr>
                <?php  
}  
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
      <input type="text" name="fidforsearch"  placeholder="Enter booking id to cancel" class="search">
      <input type="submit" name="book" value="Cancel" class="book">
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