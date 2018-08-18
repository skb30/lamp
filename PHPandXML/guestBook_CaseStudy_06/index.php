<html>
<head><title></title></head>
<body>
<?php


  // $search_array = array('first' => null, 'second' => 4);
  // $output = array_key_exists('first', $search_array);
  //
  // $bodytag = str_replace("%body%", "black", "body text='%body%' ");
  $myVar=0;
  echo isset($myVar);

  // echo $bodytag;

  // $x = empty($empty);
  // echo $x;
  // if ($x) {
  //   echo "true";
  // } else { echo "false";}
  // echo gettype($output);

  // include 'addEntry.php';
  // SprintAllEntries();
?>
<h2> Please submit your comments here </h2>
<br>
<form method="POST" action="addEntry.php">
Name:
<input name="Name" type="text">
<br>
Email:
<input name="Email" type="text">
<br>
<br>
Age:
<input name="Age" type="text">
<br>
Comments:
<br>
<textarea name="Comments" cols="50" rows="5"></textarea>
<br>
<br>
<input type="Submit" value="submit">
</form>
</body>
</html>
