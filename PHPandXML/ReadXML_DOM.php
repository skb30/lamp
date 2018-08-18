<?php
$xml = new DOMDocument();
$xml->load( 'test_file.xml' );

$makes = $xml->getElementsByTagName( "make" );
foreach( $makes as $make )
  {
  $models = $make->getElementsByTagName( "model" );
  $model = $models->item(0)->nodeValue;
  $attr = $make->getAttributeNode("name");
  $attr = $attr->nodeValue;

  echo "$attr - $model <br>";
  }
?>