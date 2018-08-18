<?php

class square extends rectangle
{
    function __construct ($side) {
        $this->setName('Square');
        $this->length = $side;
        $this->width = $side;
        echo "Square is created <br>";
    }

}

?>
