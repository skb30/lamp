<html>
<head>
<title>Background Colors change based on the day of the week</title>
</head>
<?php
$today = date("w");
print "Today is ". $today . "</br>";
$bgcolor = array(
"Blue", "White", "Red", "Yellow",
"Lime", "Orange", "Green"
);
//echo "Today is : $bgcolor[$today]";
?>
<body bgcolor="<?php print("$bgcolor[$today]");?>">
<br>This changes the background color of the HTML page based on the day of the week
</body>
</html>