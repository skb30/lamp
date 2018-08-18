<?php

$xmlFilename = "guestBook.xml";

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
    if (preg_match('/^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/', $address))
    return true;
    else
    return false;
}

function addContent ($node, $input) {
    $newEntry = $node->addChild('NewEntry');
    $newEntry->addChild('Name', $input['Name']);
    $newEntry->addChild('Email', $input['Email']);
    $newEntry->addChild('Age', $input['Age']);
    $newEntry->addChild('Comments', $input['Comments']);
}

function writeXMLFile ($content) {

    global $xmlFilename;
    $content->asXML($xmlFilename);
    echo "Wrote file: " . $xmlFilename . "<br>";
    echo "Thank You for your feedback <br>";
    echo '<hr>';
}

function readExistingXML () {
    global $xmlFilename;
    if (file_exists($xmlFilename)) {
        $xml = simplexml_load_file($xmlFilename);
        return $xml;
    } else {
        $xml = new SimpleXMLElement('<GuestBook></GuestBook>');
        return $xml;
        //exit("Failed to open $xmlFilename for reading existing entries.");
    }
}

function writeXML($input) {

    $xml = readExistingXML();

    addContent($xml, $input);

    writeXMLFile($xml);
}

function printAllEntries () {
    global $xmlFilename;
    if (file_exists($xmlFilename)) {
        $xml = simplexml_load_file($xmlFilename);
        echo ('<pre>');
        print_r($xml);
        echo ('</pre>');
    } else {
        exit("Failed to open $xmlFilename for printing all entries.");
    }
}

if (filled_out($_POST) && valid_email($_POST['Email']))
{
    echo "Your data has been recorded as below: <br>";
    echo "Name: " . htmlspecialchars($_POST['Name']) . "<br>";
    echo "Email: " . htmlspecialchars($_POST['Email']) . "<br>";
    echo "Age: " . htmlspecialchars($_POST['Age']) . "<br>";
    echo "Comments: " . htmlspecialchars($_POST['Comments']) . "<br>";
    echo '<hr>';
    $inputArray = array('Name'=>htmlspecialchars($_POST['Name']),
                        'Email'=>htmlspecialchars($_POST['Email']),
                        'Age'=>htmlspecialchars($_POST['Age']),
                        'Comments'=>htmlspecialchars($_POST['Comments']));
    writeXML($inputArray);
    echo $inputArray;
    printAllEntries();
} else {
    // Could add code to redirect back to HTML form with error msg below
    echo "Please go back and fill-in all fields correctly<br>";
}


?>
