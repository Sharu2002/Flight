<?php

@include 'config.php';


session_start();
$fid = $_SESSION['fid'];
$username =  $_SESSION['user_name'];

if(isset($_POST['submit']))
{  
   $nooftickets = $_POST['name'];
   $ticket_type = $_POST['ticket_type'];

   $select = " SELECT * FROM register WHERE name = '$username'";

   $result = mysqli_query($conn, $select);
   $user_id  = "";

   while($row = mysqli_fetch_assoc($result))
    {
        $user_id = $row['id'];
    }


         $insert = "INSERT INTO bookings(userid, flightid , no, class) VALUES('$user_id','$fid','$nooftickets','$ticket_type')";
         mysqli_query($conn, $insert);
         header('location:user_home.php');    
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Booking form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="style.css">

</head>
<body class="body">
   
<div class="form-container">

   <form action="" method="post">
      <h3>Ticket Booking</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="text" name="name" required placeholder="enter number of tickets">

      <select name="ticket_type">
         <option value="First Class">First Class</option>
         <option value="Business Class">Business Class</option>
         <option value="Premium Economy">Premium Economy</option>
         <option value="Economy Class">Economy Class</option>
     

      </select>
      <input type="submit" name="submit" value="Book now" class="form-btn">
   </form>

</div>

</body>
