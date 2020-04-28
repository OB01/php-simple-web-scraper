<?php 
header('Content-Type: application/json');
  
if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') 
    $link = "https"; 
else
    $link = "http"; 
  
// Here append the common URL characters. 
$link .= "://"; 
  
// Append the host(domain name, ip) to the URL. 
$link .= $_SERVER['HTTP_HOST']; 
  
// Append the requested resource location to the URL 
$link .= $_SERVER['REQUEST_URI']; 
      
// Print the link 
echo $link; 

$q = $_SERVER["QUERY_STRING"] ? $_SERVER["QUERY_STRING"] : false;

echo 'get '.$q;

if ($q && strlen($q)==13) {
    $json = file_get_contents("https://www.batzo.net/api/v1/products?barcode=".$q."&key=137KgWcLdudxbneOrk8IkJfA5Hm9nEzedHOb");
    echo $json;
};
?> 