<?php
function generate_jwt($headers, $payload, $secret = 'B6DEE7FD5335D910BECAD820A8351152B69A58F1C09E0BC8FAC81F1DBAFF9422') {
    $headers_encoded = base64url_encode(json_encode($headers));

    $payload_encoded = base64url_encode(json_encode($payload));

    $signature = hash_hmac('SHA256', "$headers_encoded.$payload_encoded", $secret, true);
    $signature_encoded = base64url_encode($signature);

    $jwt = "$headers_encoded.$payload_encoded.$signature_encoded";

    return $jwt;
}

function base64url_encode($str) {
    return rtrim(strtr(base64_encode($str), '+/', '-_'), '=');
}

$headers = array('alg'=>'HS256','typ'=>'JWT');
$payload = array(
    'iss'=> '34aa9f1e-4e02-4420-af3e-e2ab7801e6f9',
    'iat'=> time(),
    'exp'=>(time() + 60000),
    'aud'=> 'medfile',
    'sub'=> '',
    'practitioner'=> 'a43f8faa-de0d-4a57-98ba-a35ad4dee431'
);

$jwt = generate_jwt($headers, $payload);

echo $jwt;

