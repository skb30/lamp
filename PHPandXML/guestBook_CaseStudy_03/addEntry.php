<?php


function filled_out($form_vars)
{
  // test that each variable has a value
  foreach ($form_vars as $key => $value)
  {
     if (!isset($key) || ($value == ''))
        return false;
  }
  return true;
}

function valid_email($address)
{
  // check an email address is possibly valid
  if (ereg('^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$', $address))
    return true;
  else
    return false;
}

function addContent ($node, $input) {
    $node->addChild('Name', $input['Name']);
    $node->addChild('Email', $input['Email']);
    $node->addChild('Comments', $input['Comments']);
}

function writeXMLFile ($content) {
    $filename = "Guest_". microtime(true) . ".xml";
    $content->asXML($filename);
    echo "Wrote file: " . $filename . "<br>";
    echo "Thank You for your feedback <br>";
}

function writeXML($input) {

    $xml = new SimpleXMLElement('<GuestBook></GuestBook>');
    $newEntry = $xml->addChild('NewEntry');

    addContent($newEntry, $input);

    writeXMLFile($xml);
}


if (filled_out($_POST) && valid_email($_POST['Email']))
{
    echo "Name: " . htmlspecialchars($_POST['Name']) . "<br>";
    echo "Email: " . htmlspecialchars($_POST['Email']) . "<br>";
    echo "Comments: " . htmlspecialchars($_POST['Comments']) . "<br>";
    $inputArray = array('Name'=>htmlspecialchars($_POST['Name']),
                        'Email'=>htmlspecialchars($_POST['Email']),
                        'Comments'=>htmlspecialchars($_POST['Comments']));
    writeXML($inputArray);
} else {
    // Could add code to redirect back to HTML form with error msg below
    echo "Please go back and fill-in all fields correctly<br>";
}


?>
