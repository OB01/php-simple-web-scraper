<?php
    $links = parse_ini_file('codes.ini');

    if(isset($_GET['code']) && array_key_exists($_GET['code'], $links)){
        header('Location: ' . $links[$_GET['code']]);
    }
    else{
        header('HTTP/1.0 404 Not Found');
        echo 'Unknown link.';
    }
?>
