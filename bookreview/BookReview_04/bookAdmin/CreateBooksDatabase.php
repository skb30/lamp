<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $connect = mysql_connect("localhost", "lamp", "") or
        die ("Hey!, check your server connection.");
        //create the main database if it doesn't already exist
        $create = mysql_query("CREATE DATABASE IF NOT EXISTS booksDB")
        or die(mysql_error());
        //make sure our recently created database is the active one
        mysql_select_db("booksDB");

        //create "login" table
        $books = "CREATE TABLE books (ID bigint AUTO_INCREMENT PRIMARY KEY,
        title varchar(2000),
        lead_author varchar(255),
        year_published year(4),
        rating decimal(2,1) UNSIGNED
        )";
        $results = mysql_query($books)
        or die (mysql_error());

        $rating = "CREATE TABLE rating (ID bigint AUTO_INCREMENT PRIMARY KEY,
        bookID bigint,
        bookTitle varchar(2000),
        username varchar(255),
        timestmp timestamp,
        rating decimal(2,1) UNSIGNED,
        review text
        )";
        $results = mysql_query($rating)
        or die (mysql_error());

        echo "booksDB Database successfully created!";
        ?>
    </body>
</html>
