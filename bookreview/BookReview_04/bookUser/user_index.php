<?php

include '../authentication/header.php';

// Start session
session_start(); 

// Check if user is logged in
if(isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    //echo 'Hi '. $username . ', welcome to your profile!';

    include '../bookAdmin/connectBooksDB.php';

    $query = mysql_query("SELECT * FROM books") or die(mysql_error());

    echo '<p></p>';
    echo '<table border="1">';
    echo '<tr>';
    echo '<th>Title</th><th>Author</th><th>Year</th><th>Rating</th><th>Rate/Review</th><th>Browse Reviews</th>';
    echo '</tr>';
    while ($result= mysql_fetch_assoc($query)) {

        //print_r($result);
        //echo '<p></p>';

        echo '<tr>';
        echo '<td>' . $result[title] . '</td>';
        echo '<td>' . $result[lead_author] . '</td>';
        echo '<td>' . $result[year_published] . '</td>';
        echo '<td>' . $result[rating] . '</td>';
        echo '<td>' . "<form action=\"rateReviewBook.php\" method=\"post\">
                        <input type=\"hidden\" name=\"rate\" value=\"" . $result[ID] . "\">
                        <input type=\"submit\" value=\"Rate This\"></form>" . '</td>';
        echo '<td>' . "<form action=\"browseReviews.php\" method=\"get\">
                        <input type=\"hidden\" name=\"browse\" value=\"" . $result[ID] . "\">
                        <input type=\"submit\" value=\"Browse\"></form>" . '</td>';
        echo '</tr>';
    }
    echo '</table>';

}

?>
