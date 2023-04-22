<?php

@include 'config.php';

if(isset($_POST['submit'])){

   $name = $_POST['name'];
   $flightno = $_POST['flightno'];
   $start = $_POST['start'];
   $end = $_POST['end'];
   $fare = $_POST['fare'];
   $starttime = $_POST['starttime'];
   $endtime = $_POST['endtime'];
   $insert = "INSERT INTO train(name, flightno, start , end, fare , starttime , endtime) VALUES('$name','$flightno','$start','$end','$fare' , '$starttime','$endtime')";

   $result = mysqli_query($conn, $insert);

   header('location:admin_home.php');
};


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="style.css">

</head>
<body class="body">
   
<div class="form-container">

   <form action="" method="post">
      <h3>Add Flight</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="text" name="name" required placeholder="enter flight name">
      <input type="text" name="flightno" required placeholder="enter flightno">
      <input type="text" name="start" required placeholder="enter start place">
      <input type="text" name="end" required placeholder="enter end place">
      <input type="text" name="fare" required placeholder="enter fare">
      <input type="text" name="starttime" required placeholder="enter start time">
      <input type="text" name="endtime" required placeholder="enter end time">

      <input type="submit" name="submit" value="Add Flight" class="form-btn">
   </form>

</div>

</body>