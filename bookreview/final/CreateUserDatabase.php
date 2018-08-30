<!DOCTYPE html>

<html>
    <head>
        <title>LAMP Final Project</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
      <body>
        <?php
            $conn = new mysqli("127.0.0.1", "root", "ucsc", "lamp");
            if ($conn->connect_errno) {
              die("MySQL connection failed: " . $conn->connect_error);
            }
            // create DB if it doesn't exist
            $create = $conn->query("CREATE DATABASE IF NOT exists usersDB") or die("DB Create Failed: " . $conn->error);
            mysqli_select_db($conn, "usersDB");

            // create login table
            $login = "CREATE TABLE login (ID mediumint(9) " .
                      "AUTO_INCREMENT PRIMARY KEY, " .
                      "username varchar(255), " .
                      "password varchar(40), " .
                      "email varchar(255))";

            echo $login;
            $result = $conn->query($login) or die($conn->error)

        ?>



        <form action="action.php" method="post">
            <p>Your name: <input type="text" name="name" /></p>
            <p>Your age: <input type="text" name="age" /></p>
            <p><input type="submit" /></p>
        </form>
    </body>
</html>
