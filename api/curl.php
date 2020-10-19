<?php


// kvstore API url
//if (isset($_POST['teste']) == 'especialistas') {
    
    $action = $_REQUEST['action'];
$url = 'https://api.feegow.com/v1/api/'.$action;
$request_url = $url;
$curl = curl_init($request_url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HTTPHEADER, [
    'X-RapidAPI-Host: kvstore.p.rapidapi.com',
    'x-access-token:eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJmZWVnb3ciLCJhdWQiOiJwdWJsaWNhcGkiLCJpYXQiOiIxNy0wOC0yMDE4IiwibGljZW5zZUlEIjoiMTA1In0.UnUQPWYchqzASfDpVUVyQY0BBW50tSQQfVilVuvFG38 ',
    'Content-Type:application/json'
]);
$response = curl_exec($curl);
curl_close($curl);
echo $response;





?>