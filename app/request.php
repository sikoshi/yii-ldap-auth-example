<?php


$password = 'duDewZm35qZpyuSnelm1';

$api_name = 'tstkasiettizhol';

$request_body = ["is_active" => "true"];

$json = json_encode($request_body);

$signature = hash_hmac('sha256', $json, $password, true);

$postData = [

    'Signature' => $signature,

    'Api-Name' => $api_name,

    'Request body' => $request_body

];

$ch = curl_init('https://tstmpay.beeline.kz/merchant-api/v1/');

curl_setopt_array($ch, array(

    CURLOPT_POST => TRUE,

    CURLOPT_RETURNTRANSFER => TRUE,

    CURLOPT_HTTPHEADER => array(

        'Content-Type: application/json'

    ),

    CURLOPT_POSTFIELDS => json_encode($postData)

));

//dd($ch);

$response = curl_exec($ch);