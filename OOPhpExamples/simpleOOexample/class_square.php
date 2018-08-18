<?php

class square extends rectangle
{
    function __construct ($side) {
        $this->name = 'Square';
        $this->length = $side;
        $this->width = $side;
        echo "Square is created <br>";
    }

}

?>
