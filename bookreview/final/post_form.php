<?php
include 'includes/functions.php';
// initialize vars to empty strings
$title = $price = $description = $email = $agreement =  $subCat = $location = "";
$titleErr = $priceErr = $descriptionErr = $emailErr = $agreementErr =  $subCatErr = $locationErr = "";

// parse the post request looking for date entry errors. If we finds some report
// the errors back to the form.
if ($_SERVER["REQUEST_METHOD"] == "POST") {

// testing file upload
//    print "userfile1 == " .  $_FILES["userfile1"]["tmp_name"];
//    print_r($_FILES["userfile1"]);

    if (empty($_POST["Title"])) {
        $titleErr = "Title is required";
    } else {
        $title = test_input($_POST["Title"]);
    }
    if (empty($_POST["Price"])) {
        $priceErr = "Price is required";
    } else {
        $price = test_input($_POST["Price"]);
    }

    if (empty($_POST["Description"])) {
        $descriptionErr = "Description  is required";
    } else {
        $description = test_input($_POST["Description"]);
    }
    $email = test_input($_POST["email"]);
    // validate the format of the email address
    if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
//        $email = test_input($_POST["Description"]);

    } else {
        $emailErr = "Invalid email format.";
    }

    if (empty($_POST["terms"])) {
        $agreementErr = "You must accept the terms of the agreement.";
    } else {
        $agreement = test_input($_POST["terms"]);
    }

    $subCat = test_input($_POST["sub-cat"]);
    $location = test_input($_POST["location"]);

    // if all data has been cleaned commit it to the database
    if (empty($titleErr) and empty($priceErr) and empty($descriptionErr) and empty($emailErr) and empty($agreementErr) and empty($subCatErr) and  empty($locationErr)) {
        postIt();
        header("Location: http://localhost/ucsc-lamp/final"); /* Redirect browser */
        exit();
    }
}
// clean the data to make sure it's safe
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
//    print $data;
    return $data;

}
?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./tablestyles.css">
    <title>Post</title>
</head>
<body>
<h1>Post Form</h1>
    <div class="menu"></div>


    <div class="form">
        <form enctype="multipart/form-data" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

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
    Title: <input type="text" name="Title"><span class="error">* <?php echo $titleErr;?></span><br><br>

    Price: <input type="number" name="Price"><span class="error">* <?php echo $priceErr;?></span><br><br>
    Description: <input type="text" name="Description"><span class="error">* <?php echo $descriptionErr;?></span><br><br>
    Email: <input type="text" name="email"><span class="error">* <?php echo $emailErr;?></span><br><br>
            I agree with terms and conditions:<input type="checkbox" name="terms"> <span class="error">* <?php echo $agreementErr;?></span><br><br>


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