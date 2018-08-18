<html>
<head><title></title></head>
<body>
    <?php
        $ans = $_GET[Question1];
        if ($ans == "New Delhi")
        {
            echo "Congratulations! ";
        } else {
            echo "Oops! Try again. ";
        }
        
        echo "You selected the answer: $ans";
    ?>
</body>
</html>
