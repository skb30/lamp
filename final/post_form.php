<!DOCTYPE html>
<?php include 'includes/functions.php'; ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./mystyles.css">
    <title>Post</title>
</head>
<body>
<h1>Post Form</h1>
    <div class="menu"></div>


    <div class="form">
    <form enctype="multipart/form-data" action="post.php" method="POST">

    <h4>Category</h4>
    <select name="sub-cat" multiple>

        <?php
            // create the sub-category drop-down selection list
            SubCatsList()
        ?>

    </select>

        <h4>Location</h4>
        <select name="location" multiple>

            <?php
            // create the sub-category drop-down selection list
            locationsList()
            ?>

        </select>

    <br><br>
    Title: <input type="text" name="Title"><br>
    Price: <input type="text" name="Price"><br>
    Description: <input type="text" name="Description"><br>
    Email: <input type="text" name="email"><br>
    Confirm Email:<input type="text" name="confirm"><br><br>
        I agree with terms and conditions <input type="checkbox" name="terms"><br><br>

    <h3>Optional fields:</h3>

    <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
    Image 1 (max 5 MB: <input name="userfile1" type="file" /><br>
    <input type="hidden" name="MAX_FILE_SIZE" value="30000" /><br>
    Image 2 (max 5 MB: <input name="userfile2" type="file" /><br>
     <input type="hidden" name="MAX_FILE_SIZE" value="30000" /><br>
    Image 3 (max 5 MB: <input name="userfile3" type="file" /><br>
     <input type="hidden" name="MAX_FILE_SIZE" value="30000" /><br>
    Image 4 (max 5 MB: <input name="userfile4" type="file" /><br>
     <input type="hidden" name="MAX_FILE_SIZE" value="30000" /><br>
    Image 5 (max 5 MB: <input name="userfile5" type="file" /><br>

    <input type="Submit" />
    <input type="Reset" />
    </form>

    </div> <!-- close form -->
</body>
</html>