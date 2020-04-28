<?php
    $file = 'codes.ini';
    $codes = parse_ini_file($file);
    header('Content-Type: application/json');

    if(isset($_GET['code']) && array_key_exists($_GET['code'], $codes)){
        echo $codes[$_GET['code']];
    }
    else{
        if (isset($_GET['code']) && strlen($_GET['code'])===13) {
            $json = file_get_contents("https://www.batzo.net/api/v1/products?barcode=".$_GET['code']."&key=137KgWcLdudxbneOrk8IkJfA5Hm9nEzedHOb");
            echo $json;
            $codes[$code] = $json;
            write_ini_file($codes, $file);
            exit;
        };
    };
?>
