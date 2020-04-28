<?php 
header('Content-Type: application/json');

$q = $_SERVER["QUERY_STRING"] ? $_SERVER["QUERY_STRING"] : false;

if (is_numeric($q) && strlen($q)==13 {
    if (!file_exists($q.".json")) {  
        $json = file_get_contents("https://www.batzo.net/api/v1/products?barcode=".$q."&key=137KgWcLdudxbneOrk8IkJfA5Hm9nEzedHOb");
        echo $json;
    }
    else{
        echo file_get_contents($q.".json");
    };
}
else{
    echo $q;
};



?> 