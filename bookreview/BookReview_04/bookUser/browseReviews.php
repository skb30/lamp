<?php

include '../authentication/header.php';

// Start session
session_start();

// Check if user is logged in
if(isset($_SESSION['username'])) {

    if (isset($_GET['browse']))
    {
        include '../bookAdmin/connectBooksDB.php';
        //echo 'bookID is set' . $_SESSION['bookID'];
        $sql = "SELECT * FROM rating WHERE bookID=\"" . $_GET['browse'] . "\"";
        $query = mysql_query($sql) or die(mysql_error());

        echo '<p></p>';
        echo '<table border="1">';
        echo '<tr>';
        echo '<th>Title</th><th>Username</th><th>Rating</th><th>Review</th>';
        echo '</tr>';
        while ($result= mysql_fetch_assoc($query)) {

            //print_r($result);
            //echo '<p></p>';

            echo '<tr>';
            echo '<td>' . $result[bookTitle] . '</td>';
            echo '<td>' . $result[username] . '</td>';
            echo '<td>' . $result[rating] . '</td>';
            echo '<td>' . $result[review] . '</td>';
            echo '</tr>';
        }
        echo '</table>';
        echo '<p></p>';
        echo '<a href="user_index.php">Browse Book List</a>';

    }

}
?>
