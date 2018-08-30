<?php
// Open a connection to the DB
//$conn = new mysqli("localhost", "lamp", "", "images");

/*
echo "Thanks for uploading file :" . $_FILES['userfile']['name'] . "<br>";
echo "File size is : " . $_FILES['userfile']['size'] . "<br>";
echo "File type is : " . $_FILES['userfile']['type'] . "<br>";
echo "File tmp_name is : " . $_FILES['userfile']['tmp_name'] . "<br>";
*/

//$stmt = $conn->prepare("INSERT INTO images VALUES(NULL, ?)");
//$stmt->bind_param("s", $data);
//$file = $_FILES['userfile']['tmp_name'];
//$fp = fopen($file, "r");
//$size = 0;
//while ($data = fread($fp,1024)) {
//    $size += strlen($data);
//    $stmt->send_long_data(0,$data);
//}
//if ($stmt->execute()) {
//    print "$file ($size bytes) was added to the files table\n";
//} else {
//    die($conn->error);
//}
//
//
//echo '<html>';
//echo '<head></head>';
//echo '<body>';
//echo '<br><a href="download.php">Retrieve Image</a>';
//echo '</body>';
//echo '</html>';


// database connection
mysql_connect("localhost", "lamp", '') OR DIE (mysql_error());

// select the db
mysql_select_db ('images') OR DIE ("Unable to select db".mysql_error());

// prepare the image for insertion
$imgData =addslashes (file_get_contents($_FILES['userfile']['tmp_name']));

// our sql query
$sql = "INSERT INTO images (image) VALUES ('{$imgData}')";

if(!mysql_query($sql)) {
    echo 'Unable to upload file';
}
else
{
    echo 'upload SUCCESS!';
}

echo '<html>';
echo '<head></head>';
echo '<body>';
echo '<br><a href="download.php">Retrieve Image</a>';
echo '</body>';
echo '</html>';


?>


