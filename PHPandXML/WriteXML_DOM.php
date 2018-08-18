    * <?php
      $xml = new DOMDocument();
      $xml->formatOutput = true;

      $root = $xml->createElement( "cars" );
      $xml->appendChild( $root );

      $make = $xml->createElement( "make" );

      $model = $xml->createElement( "model" );
      $model->appendChild($xml->createTextNode("M5"));
      $make->appendChild( $model );

      $make_attr = $xml->createAttribute("name");
      $make->appendChild( $make_attr );
      $attr_value = $xml->createTextNode("BMW");
      $make_attr->appendChild($attr_value);
      
      $root->appendChild( $make );

      echo $xml->save('output_file.xml');
      ?>
