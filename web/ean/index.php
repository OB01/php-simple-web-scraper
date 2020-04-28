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
$request = $_SERVER['REQUEST_URI'];
$link .= $request; 
      
// Print the link 
echo $link; 

echo 'request '.$request;

if($_GET){

    echo 'get '.$_GET;

    if (strlen($_GET)==13) {
        $json = file_get_contents("https://www.batzo.net/api/v1/products?barcode=".$request."&key=137KgWcLdudxbneOrk8IkJfA5Hm9nEzedHOb");
        //header('Content-Type: application/json');
        echo $json;
    };
}:
?> 