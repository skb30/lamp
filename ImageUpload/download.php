<?php

// Open a connection to the DB
$conn = new mysqli("localhost", "lamp", "", "images");

$imagerow=mysqli_query($conn, "SELECT * FROM images");
//printf("Select returned %d rows.\n", mysqli_num_rows($imagerow));

header('Content-type: image/jpg');
//database connection routine
// Connecting to a MySql Database
if ($row = $imagerow->fetch_assoc()){
  $imageData = $row['image'];
  echo $imageData;
}

?>
