<?php
/**
 * PHP Template.
 */

$conn = new mysqli("127.0.0.1", "root", "ucsc", "lamp");
if ($conn->connect_errno) {
    die("MySQL connection failed: " . $conn->connect_error);
}
print "Successfully connected to " . $conn->host_info . "<br>\n";

// Single statement query
// uses unbuffered query
print "<br>\n" . "Output from Single Statement query example" . "<br>\n";
$result = $conn->query("SELECT * FROM t1");
while ($row = $result->fetch_row())  {
    print $row[0] . " " . $row[1] . "<br>\n";
}
$result->free();

// Multi-Statement query
// uses buffered query
print "<br>\n" . "Output from Multi-Statement query example" . "<br>\n";
$query = "SELECT * FROM t1;";
$query .= "SELECT * FROM t2";
if ($conn->multi_query($query)) {
    do {
        if ($result = $conn->store_result()) {
            while ($row = $result->fetch_row()) {
                printf("%s\t%s<br>\n", $row[0], $row[1]);
            }
            $result->close();
        }
    } while ($conn->next_result());
}

// Prepared statement
print "<br>\n" . "Output from Prepared Statement query example" . "<br>\n";
$stmt = $conn->prepare("SELECT * FROM t1");
$stmt->execute();
$stmt->bind_result($col1,$col2, $col3, $col3);
print "<table>\n";
print "<tr><th>Column 1</th><th>Column 2</th></tr>\n";
while ($stmt->fetch()) {
    print "<tr><td>$col1</td><td>$col2</td></tr>\n";
}
print "</table>\n";

//$conn->close();

// BLOB handling
$conn->query("CREATE TABLE files (id INTEGER PRIMARY KEY AUTO_INCREMENT, data BLOB)");
$stmt = $conn->prepare("INSERT INTO files VALUES(NULL, ?)");
$stmt->bind_param("s", $data);
$file = "test.jpg";
$fp = fopen($file, "r");
$size = 0;
while ($data = fread($fp,1024)) {
    $size += strlen($data);
    $stmt->send_long_data(0,$data);
}
if ($stmt->execute()) {
    print "$file ($size bytes) was added to the files table\n";
} else {
    die($conn->error);
}

$conn->close();

?>
