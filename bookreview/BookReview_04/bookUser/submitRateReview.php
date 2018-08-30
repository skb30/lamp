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
    $query = "SELECT rating FROM books WHERE ID = \"" . $_POST['rate'] . "\"";
    $result = mysql_fetch_assoc(mysql_query($query));

    //    echo '<br>';
    //    echo 'Current rating is : ' . $result['rating'];
    //    echo '<br>';
    //    echo 'User submitted rating is : ' . $_POST['rating'];
    $newRating = ($_POST['rating'] + $result['rating'])/2;
    //    echo '<br>';
    //    echo 'New Average Rating is : ' . $newRating;
    //    echo '<br>';
    $review = mysql_real_escape_string($_POST['review']);
    //    echo 'Submitted Review is : ' . $review;
    //    echo '<br>';

    $query="INSERT INTO rating (bookID, bookTitle, username, timestmp, rating, review)
VALUES
('$_POST[rate]','$_POST[title]','$username', NOW(), '$_POST[rating]','$review')";

    if (!mysql_query($query))
    {
        die('Error inserting new rating and review : ' . mysql_error());
    }

    $query="UPDATE books SET rating=$newRating WHERE ID=$_POST[rate]";

    if (!mysql_query($query))
    {
        die('Error udpating new rating : ' . mysql_error());
    }

    echo '<h2>You have submitted follwing book reviews:</h2><br>';
    $query = "SELECT bookTitle, username, timestmp, rating, review  FROM rating WHERE username=\"" . $username . "\"";
    if (!($result = mysql_query($query)))
    {
        die('Error listing user reviews : ' . mysql_error());
    } else {
        echo '<p></p>';
        echo '<table border="1">';
        echo '<tr>';
        echo '<th>Timestamp</th><th>Title</th><th>Rating</th><th>Review</th>';
        echo '</tr>';

        while($row = mysql_fetch_array($result))
        {
            echo '<tr>';
            echo '<td>' . $row[timestmp] . '</td>';
            echo '<td>' . $row[bookTitle] . '</td>';
            echo '<td>' . $row[rating] . '</td>';
            echo '<td>' . $row[review] . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    }
    echo '<p></p>';
    echo '<a href="user_index.php">Browse Book List</a>';
}

?>
