<?php
$xml = new SimpleXMLElement('<cars></cars>');
$make = $xml->addChild('make');
$make->addAttribute('name','BMW');
$model = $make->addChild('model', 'M5');
// This will output the XML
//$xml->asXML();
// This will save the XML to a file called output_file.xml
$xml->asXML('output_file.xml');
?>
