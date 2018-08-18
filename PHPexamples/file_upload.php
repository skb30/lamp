<?php
/**
 * PHP Template.
 */
echo "Thanks for uploading file :" . $_FILES['userfile']['name'] . "<br>";
echo "File size is : " . $_FILES['userfile']['size'] . "<br>";
echo "File type is : " . $_FILES['userfile']['type'] . "<br>";
echo "File tmp_name is : " . $_FILES['userfile']['tmp_name'] . "<br>";
move_uploaded_file ($_FILES['userfile'] ['tmp_name'],
       "/Users/scott/web_file_uploads/{$_FILES['userfile'] ['name']}")
;?>
