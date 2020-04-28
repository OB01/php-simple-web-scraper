<?php 
header('Content-Type: application/json');

$q = $_SERVER["QUERY_STRING"] ? $_SERVER["QUERY_STRING"] : false;

if ($q && strlen($q)==13 && is_numeric($q) {
    if (!file_exists($q.".json")) {  
        $file = fopen($q.".json", "w") or die("Unable to open file!");
        $json = file_get_contents("https://www.batzo.net/api/v1/products?barcode=".$q."&key=137KgWcLdudxbneOrk8IkJfA5Hm9nEzedHOb");
        echo $json;
        fwrite($file, $json);
        fclose($file);
    }
    else{
        echo file_get_contents($q.".json");
    };
}
else{
    echo $q;
};



?> 