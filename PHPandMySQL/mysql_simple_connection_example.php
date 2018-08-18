<?php

//
//$conn = mysqli_connect("localhost", "taral", "", "test");
//if (empty($conn)) {
//    die("MySQL connection failed: " . mysqli_connect_error());
//}
//print "Successfully connected to " . mysqli_get_host_info($conn) . "\n";
//mysqli_close($conn);
    
/*
 * More Object Oriented way
 */
$conn = new mysqli("localhost", "taral", "", "test");
if ($conn->connect_errno) {
    die("MySQL connection failed: " . $conn->connect_error);
}
print "Successfully connected to " . $conn->host_info . "\n";
$conn->close();
  
?>
