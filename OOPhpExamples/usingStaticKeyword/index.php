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
            echo "$myShape <br>";
            echo shape::$color . "<br>";
            echo "Color of this shape created is : " . shape::getColor() . "<br>";
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
            echo "$myCircle <br>";
            echo shape::$color . "<br>";
            echo "Color of this shape created is : " . circle::getColor() . "<br>";
            $myCircle = NULL;


            // Creating a rectangle instance
            require_once('class_rectangle.php');
            $myRectangle = new rectangle(10,5);
            echo $myRectangle->calculateArea() . "<br>";
            $myRectangle->width = 7;
            echo $myRectangle->calculateArea() . "<br>";
            echo "$myRectangle <br>";
            echo shape::$color . "<br>";
            echo "Color of this shape created is : " . shape::getColor() . "<br>";
            $myRectangle = NULL;

            // using second level of derived (grandchild) class
            require_once('class_square.php');
            $mySquare = new square(10);
            echo $mySquare->calculateArea() . "<br>";
            echo "$mySquare <br>";
            echo shape::$color . "<br>";
            echo "Color of this shape created is : " . shape::getColor() . "<br>";
            $mySquare = NULL;

        ?>
    </body>
</html>
