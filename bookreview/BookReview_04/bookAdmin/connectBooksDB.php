<?php
// Open a connection to the DB
$conn = mysql_connect('localhost', 'lamp', '') or die(mysql_error());
mysql_select_db('booksDB', $conn);
?>
