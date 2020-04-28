<?php 
header('Content-Type: application/json');

$json = false;
$q = $_SERVER["QUERY_STRING"] ? $_SERVER["QUERY_STRING"] : false;

if ($q && strlen($q)==13 && is_numeric($q) {
    $json = file_get_contents("https://www.batzo.net/api/v1/products?barcode=".$q."&key=137KgWcLdudxbneOrk8IkJfA5Hm9nEzedHOb");
    echo $json;
};

try
{
    //open the database
    $db = new PDO('sqlite:EANcodes.sqlite');

    //create the database
    $db->exec("CREATE TABLE EAN (Code INTEGER PRIMARY KEY, Data TEXT)");    

    if($json){
    //insert some data...
    $db->exec("INSERT INTO EAN (Code, Data) VALUES ($q, $json);");
    };

    //now output the data to a simple html table...
    print "<table border=1>";
    print "<tr><td>Code</td><td>Data</td></tr>";
    $result = $db->query('SELECT * FROM EAN');
    foreach($result as $row)
    {
    print "<tr><td>".$row['Code']."</td>";
    print "<td>".$row['Data']."</td></tr>";
    }
    print "</table>";

    // close the database connection
    $db = NULL;
}
catch(PDOException $e)
{
    print 'Exception : '.$e->getMessage();
}
?> 