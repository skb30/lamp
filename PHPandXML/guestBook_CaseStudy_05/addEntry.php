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
    if (preg_match("/^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/", $address))
    return true;
    else
    return false;
}

function addContent ($node, $input) {
    $newEntry = $node->addChild('NewEntry');
    $newEntry->addChild('Name', $input['Name']);
    $newEntry->addChild('Email', $input['Email']);
    $newEntry->addChild('Comments', $input['Comments']);
}

function writeXMLFile ($content) {
    //$filename = "Guest_". microtime(true) . ".xml";
    $filename = 'guestBook.xml';
    $content->asXML($filename);
    echo "Wrote file: " . $filename . "<br>";
    echo "Thank You for your feedback <br>";
    echo '<hr>';
}

function readExistingXML () {
    if (file_exists('guestBook.xml')) {
        $xml = simplexml_load_file('guestBook.xml');
        return $xml;
    } else {
        exit('Failed to open guestBook.xml for reading existing entries.');
    }
}

function writeXML($input) {

    $xml = readExistingXML();

    addContent($xml, $input);

    writeXMLFile($xml);
}

function printAllEntries () {
    if (file_exists('guestBook.xml')) {
        $xml = simplexml_load_file('guestBook.xml');
        echo ('<pre>');
        print_r($xml);
        echo ('</pre>');
    } else {
        exit('Failed to open guestBook.xml for printing all entries.');
    }
}

if (filled_out($_POST) && valid_email($_POST['Email']))
{
    echo "Your data has been recorded as below: <br>";
    echo "Name: " . htmlspecialchars($_POST['Name']) . "<br>";
    echo "Email: " . htmlspecialchars($_POST['Email']) . "<br>";
    echo "Comments: " . htmlspecialchars($_POST['Comments']) . "<br>";
    echo '<hr>';
    $inputArray = array('Name'=>htmlspecialchars($_POST['Name']),
                        'Email'=>htmlspecialchars($_POST['Email']),
                        'Comments'=>htmlspecialchars($_POST['Comments']));
    writeXML($inputArray);
    printAllEntries();
} else {
    // Could add code to redirect back to HTML form with error msg below
    echo "Please go back and fill-in all fields correctly<br>";
}


?>
