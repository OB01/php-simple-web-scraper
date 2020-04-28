<?php
if (isset($_GET['code']) && strlen($_GET['code'])==13) {
    $json = file_get_contents("https://www.batzo.net/api/v1/products?barcode=".$_GET['code']."&key=137KgWcLdudxbneOrk8IkJfA5Hm9nEzedHOb");
    header('Content-Type: application/json');
    echo $json;
};

try
{
  //open the database
  $db = new PDO('sqlite:EANcodes.sqlite');

  //create the database
  $db->exec("CREATE TABLE EAN (Code INTEGER, Data TEXT)");    

  if($json && !isset( $json['errors'] ) ){
    //insert some data...
    $db->exec("INSERT INTO EAN (Code, Data) VALUES ($_GET['code'], $json);");
    //now output the data to a simple html table...
    print "<table border=1>";
    print "<tr><td>Code</td><td>Data</td></tr>";
    $result = $db->query('SELECT Data FROM EAN where code='.$_GET['code']);
    foreach($result as $row)
    {
    print "<tr><td>".$row['Code']."</td>";
    print "<td>".$row['Data']."</td>";
    }
    print "</table>";
  }
  else{
  //now output the data to a simple html table...
  print "<table border=1>";
  print "<tr><td>Code</td><td>Data</td></tr>";
  $result = $db->query('SELECT * EAN');
  foreach($result as $row)
  {
    print "<tr><td>".$row['Code']."</td>";
    print "<td>".$row['Data']."</td>";
  }
  print "</table>";
  }



  // close the database connection
  $db = NULL;
}
catch(PDOException $e)
{
  print 'Exception : '.$e->getMessage();
}

?>