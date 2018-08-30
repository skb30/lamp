<?php

include 'connectBooksDB.php';

if(empty($_POST['bookTitle']) OR
        empty($_POST['leadAuthor']) OR
        empty($_POST['yearPublished']) OR
        empty($_POST['rating'])) {

        // At least one of the file is empty, display an error
        echo 'You haven\'t filled in all the fields. Please do it again.';
        echo '<p></p>';
        echo '<a href="addBook.html">Add Book</a>';

    } else {

        // User has filled it all in!

        // SQL save variables
        $bookTtl = mysql_real_escape_string($_POST['bookTitle']);
        $leadAuth = mysql_real_escape_string($_POST['leadAuthor']);
        $yearPub = mysql_real_escape_string($_POST['yearPublished']);
        $rating = (int)$_POST['rating'];
        
        mysql_query("INSERT INTO books
                    (title, lead_author, year_published, rating)
                    VALUES
                    ('" . $bookTtl . "', '" . $leadAuth . "', '" . $yearPub . "', '" . $rating . "')
                    ") or die(mysql_error());

            echo 'You are successfully added new book!<br>';
            echo '<p></p>';
            echo '<a href="bookadmin_index.html">Go To Admin Home</a>';
    }

?>
