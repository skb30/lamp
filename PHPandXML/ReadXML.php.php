<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            $file = 'test_file.xml';
            $xml = simplexml_load_file($file);
            echo $xml->make[0]['name'] . "<br>";
            // Prints out "BMW" (without quotes)
            echo $xml->make[0]->model . "<br>";
            // Prints out "M5" (without quotes)
            if (count($xml->make) > 0) {
                foreach ($xml->make as $node) {
                // This prints out each of the models
                echo $node->model . "<br>";
                }
            }
        ?>
    </body>
</html>
