<?php

include 'connectBooksDB.php';

$query = mysql_query("SELECT * FROM books") or die(mysql_error());

echo '<p></p>';
echo '<table border="1">';
echo '<tr>';
echo '<th>Title</th><th>Author</th><th>Year</th><th>Rating</th><th>Delete?</th>';
echo '</tr>';
while ($result= mysql_fetch_assoc($query)) {

    //print_r($result);
    //echo '<p></p>';

    echo '<tr>';
    echo '<td>' . $result[title] . '</td>';
    echo '<td>' . $result[lead_author] . '</td>';
    echo '<td>' . $result[year_published] . '</td>';
    echo '<td>' . $result[rating] . '</td>';
    echo '<td>' . "<form action=\"deleteBook.php\" method=\"post\"><input type=\"hidden\" name=\"delete\" value=\"" . $result[ID] . "\"><input type=\"submit\" value=\"Delete\"></form>" . '</td>';
    echo '</tr>';
}
echo '</table>';

?>
