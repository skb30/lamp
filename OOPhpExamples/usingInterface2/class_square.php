<?php

require_once('interface_shape.php');

class square extends rectangle implements iCalculateArea
{
    function __construct ($side) {
        $this->name = 'Square';
        $this->length = $side;
        $this->width = $side;
        echo "Square is created <br>";
    }

}

?>
