<?php

include '../authentication/header.php';

// Start session
session_start();

// Check if user is logged in
if(isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $userID = $_SESSION['user_id'];

    include '../bookAdmin/connectBooksDB.php';
    //echo 'Selected book ID is : ' . $_POST['rate'];
    $query = "SELECT * FROM books WHERE ID = \"" . $_POST['rate'] . "\"";
    $result = mysql_fetch_assoc(mysql_query($query));

    echo '<form action="submitRateReview.php" method="post">';
    echo '<p></p>';
    echo '<table border="1">';
    echo '<tr>';
    echo '<th>Title</th><th>Author</th><th>Year</th><th>Current Rating</th><th>Your Rating</th>';
    echo '</tr>';
        echo '<tr>';
        echo '<td>' . $result[title] . '</td>';
        echo '<td>' . $result[lead_author] . '</td>';
        echo '<td>' . $result[year_published] . '</td>';
        echo '<td>' . $result[rating] . '</td>';
        echo '<td>' . '<select name="rating">
                            <option value="1.0">1.0</option>
                            <option value="2.0">2.0</option>
                            <option value="3.0" selected="selected">3.0</option>
                            <option value="4.0">4.0</option>
                            <option value="5.0">5.0</option>
                       </select>' . '</td>';
        echo '</tr>';
    echo '</table>';
    echo '<p></p>';
    echo 'Write review: <br><textarea rows="5" cols="50" name="review"></textarea><br>';
    echo "<input type=\"hidden\" name=\"rate\" value=\"" . $_POST['rate'] . "\">";
    echo "<input type=\"hidden\" name=\"title\" value=\"" . $result[title] . "\">";
    echo '<input type="submit" value="Submite Rate and Review"></form>';

}

?>
