<?php 
// Program to display URL of current page. 
  
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

if($_SERVER["QUERY_STRING"]){

    $q = $_SERVER["QUERY_STRING"];
    echo 'get '.$q;

    if (strlen($q)==13) {
        $json = file_get_contents("https://www.batzo.net/api/v1/products?barcode=".$q."&key=137KgWcLdudxbneOrk8IkJfA5Hm9nEzedHOb");
        //header('Content-Type: application/json');
        echo $json;
    };
}:
?> 