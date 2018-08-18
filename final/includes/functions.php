<?php

// create a connection to the DB
function connect() {
    $conn = new mysqli("127.0.0.1", "lamp", "1", "lamp_final_project");
    if ($conn->connect_errno) {
        die("MySQL connection failed: " . $conn->connect_error);
    }
    return $conn;
}

// List all locations
function getLocations()
{

    $conn = connect();
    $result = $conn->query("SELECT * FROM location");
    while ($row = $result->fetch_row()) {
        $location = $row[2];
        $id = $row[0];
        print "<option value=\"$id\">$location</option>\n\t";
    }
    $result->free();
}

// create the categories list
function catsList()
{

    $conn = connect();
    $result = $conn->query("SELECT * FROM Category");
    while ($row = $result->fetch_row()) {
        $subCat = $row[1];
        $id = $row[0];
        print "<option value=\"$id\">$subCat</option>\n\t";
    }
    $result->free();
}

// create the categories list
function subCatsList()
{

    $conn = connect();
    $result = $conn->query("SELECT SubCategoryName, SubCategory_ID from SubCategory");
    while ($row = $result->fetch_row()) {
        $name = $row[0];
        $id = $row[1];
        print "<option value=\"$id\">$name</option>\n\t";
    }
    $result->free();
}

function postIt()
{

    $conn = connect();

    // grab the data from the form
    $title = $_POST['Title'];
    $price = $_POST['Price'];
    $description = $_POST['Description'];
    $email = $_POST['email'];
    $agreement = $_POST['confirm'];
    $subCat = $_POST['sub-cat'];
    $location = $_POST['location'];

//    print "Title $title <br>";
//    print "price $price <br>";
//    print "description $description <br>";
//    print "email $email <br>";
//    print "agreement $agreement <br>";
//    print "sub-cat $subCat <br>";
//    print "location $location <br>";
//    return;


    // build the insert stmt
    $query = "insert into Post (Title, Description, Price, subCategoryID, locationID )";
    $query .= " Values('$title', '$description', $price, $subCat, $location);";
    $stmt = $conn->prepare($query);
//    print $query;
//    return;
    $stmt->execute();
//    if ($stmt->execute()) {
//        print "row added to table\n";
//    } else {
//        die($conn->error);
//    }
//    $stmt->free();
}

// create the location list
function locationsList()
{

    $conn = connect();
    $query = "SELECT LocationName, Region_Name, Location_ID FROM Location, ";
    $query .= " Region where Region.Region_ID = Location.Region_ID;";

    $result = $conn->query($query);
    while ($row = $result->fetch_row()) {
        $location = $row[0];
        $region = $row[1];
        $id = $row[2];
        print "<option value=\"$id\">$location - $region</option>\n\t";
    }
    $result->free();
}

// load the table from the DB
function loadTable()
{
    $conn = connect();
    $query = "SELECT SubCategoryName FROM Category, SubCategory where Category.Category_ID = SubCategory.Category_ID;";
    $query .= "select Region_Name from Region; " ;
    $query .= "SELECT LocationName FROM Location, Region where Region.Region_ID = Location.Region_ID;" ;

    //echo $query;
    if ($conn->multi_query($query)) {
        do {
            if ($result = $conn->store_result()) {
                while ($row = $result->fetch_row()) {
                    printf("%s\t%s<br>\n", $row[0], $row[1]);
                }
                $result->close();
            }
        } while ($conn->next_result());
    }
}

// Get the list of items from the sub-category
function listItems($subCategory) {
    $conn = connect();
    
    // get the category name so that we can use in the H1 title
    $query = "select SubcategoryName from SubCategory where $subCategory = SubCategory_ID";
    $result = $conn->query($query);
    $row = $result->fetch_row();
    $sub = $row[0];

    $query = "SELECT Title, Price, Description, Region_Name, LocationName FROM Post, Region, Location where SubCategoryID = '$subCategory' ";
    $query .= " and Region.`Region_ID` = Location.`Region_ID` ";
    $query .= " and post.`locationID` = Location.`Location_ID`; ";
    $result = $conn->query($query);
    print "<h1> $sub for sale </h1>";
    print "<table style=\"width:100%\">\n";

    print"<th> Name </th>\n";
    print"<th> Description </th>\n";
    print"<th> Price </th>\n";
    print"<th> Location </th>\n";
    print"<th> Region </th>\n";
    while ($row = $result->fetch_row()) {
        $title          = $row[0];
        $price          = $row[1];
        $description    = $row[2];
        $region         = $row[3];
        $location       = $row[4];
        print "<tr>\n";
        print "<td>$title</td>\t\n";
        print "<td>$description</td>\t\n";
        print "<td>$price</td>\t\n";
        print "<td>$location</td>\t\n";
        print "<td>$region</td>\t\n";
        print "</tr>\n";
    }
    $result->free();
    print "</table>\n";

}

//createLocationsList();
?>