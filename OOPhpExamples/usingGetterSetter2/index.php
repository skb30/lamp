<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php

            // using parent class
            require_once('class_shape.php');
            $myShape = new shape("undefined shape");
            //echo "This shape is : " . $myShape->getName() . "<br>";
            echo "$myShape <br>";
            $myShape = NULL;

            // using a derived (child) class
            require_once('class_circle.php');      
            $myCircle = new circle(10);
            echo $myCircle->calculateArea() . "<br>";
            // changing the precision directive
            ini_set("precision", 3);
            echo $myCircle->calculateArea() . "<br>";
            // setting the precision directive back to default
            ini_set("precision", 14);
            echo "This shape is : " . $myCircle->getName() . "<br>";
            echo "$myCircle <br>";
            $myCircle = NULL;

            // Creating a rectangle instance
            require_once('class_rectangle.php');
            $myRectangle = new rectangle(10,5);
            echo $myRectangle->calculateArea() . "<br>";
            $myRectangle->width = 7;
            echo $myRectangle->calculateArea() . "<br>";
            echo "This shape is : " . $myRectangle->getName() . "<br>";
            echo "$myRectangle <br>";
            $myRectangle = NULL;

            // using second level of derived (grandchild) class
            require_once('class_square.php');
            $mySquare = new square(10);
            echo $mySquare->calculateArea() . "<br>";
            echo "This shape is : " . $mySquare->getName() . "<br>";
            echo "$mySquare <br>";
            $mySquare = NULL;

        ?>
    </body>
</html>
