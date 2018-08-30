<?php

include 'connectBooksDB.php';

echo 'Selected ID to delete is: ' . $_POST['delete'];
echo '<p></p>';

$query="DELETE FROM books WHERE ID = \"".$_POST['delete']."\"";

if (mysql_query($query)) {
    echo 'Selected ID has been deleted : ' . $_POST['delete'];
} else {
    die('Can not delete selected record: ' . mysql_error());
}

?>
