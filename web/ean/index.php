<?php 
$q = $_SERVER["QUERY_STRING"] ? $_SERVER["QUERY_STRING"] : 'no query';

if ($q && strlen($q)==13 && is_numeric($q)) {
    echo file_get_contents("https://www.batzo.net/api/v1/products?barcode=".$q."&key=137KgWcLdudxbneOrk8IkJfA5Hm9nEzedHOb");
}else{
    echo $q;
};

?> 