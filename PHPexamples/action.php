<html>
<head>
    <title>Greetings!</title>
    <meta http-equiv="Content-Type" content="text/html; charset=US-ASCII">
</head>
<body>
    Hi <?php echo htmlspecialchars($_POST['name']); ?>.
    You are <?php echo (int)$_POST['age']; ?> years old.

<?php
    /*
    * htmlspecialchar function translates the following:
    * '&' (ampersand) becomes '&amp;'
    * '"' (double quote) becomes '&quot;' when ENT_NOQUOTES is not set.
    * ''' (single quote) becomes '&#039;' only when ENT_QUOTES is set.
    * '<' (less than) becomes '&lt;'
    * '>' (greater than) becomes '&gt;'
    */
?>
</body>
</html>
