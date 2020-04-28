<?php
    $links = parse_ini_file('codes.ini');

    if(isset($_GET['code']) && array_key_exists($_GET['code'], $links)){
        header('Location: ' . $links[$_GET['code']]);
    }
    else{
        header('HTTP/1.0 404 Not Found');
        echo 'Unknown link.';
    };

    $key='option';
    $val='1.2.3.4.5';
    system("sed  -ie  's/\({$key}=\)\(.*\)/\1{$val}/' codefile.ini");
?>
