<?php 
phpinfo();

$q = $_SERVER["QUERY_STRING"] ? $_SERVER["QUERY_STRING"] : false;

if ($q && strlen($q)==13 && is_numeric($q) {
    $json = file_get_contents("https://www.batzo.net/api/v1/products?barcode=".$q."&key=137KgWcLdudxbneOrk8IkJfA5Hm9nEzedHOb");
    echo $json;
};
?> 