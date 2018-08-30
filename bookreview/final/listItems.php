<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./tablestyles.css">
    <title>SL</title>
</head>
<body>
            <?php
                include 'includes/functions.php';
            if (isset($_GET['category'])) {
                listItems($_GET['category']);
            } else {
                echo "Missing category in URL!";
            }

            ?>
</body>
</html>