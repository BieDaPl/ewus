<?php



if ($_POST['action'] == 'get_variable') {
    $variable = $pesel;

    // return the variable as a JSON object
    echo json_encode(array('variable' => $variable));
    exit;
}else{
    echo 'BRAK DANYCH';
}
include "index.html";
//include 'jwtgen.php';

$pesel = 90022803093;
function ewus_check($pesel){
    include 'jwtgen.php';
    //$jwtt = $jwt;
    $curl = curl_init();
// Set some options - we are passing in a useragent and the bearer token
    curl_setopt_array($curl, array(
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => "https://dev.services.medfile.pl/ewus/check/$pesel",
        CURLOPT_USERAGENT => '',
        CURLOPT_HTTPHEADER => array(
            'Accept: application/json',
            "Authorization: Bearer $jwt"
        ),
        CURLOPT_VERBOSE => true
    ));
// Send the request & save response to $resp
    $resp = curl_exec($curl);
//test/
// Close request to clear up some resources
    curl_close($curl);
return ($resp);
};

$resp2 = ewus_check($pesel);
$list2 = json_decode($resp2, true);

echo $list2["body"]["patient_pesel"];
echo $list2["body"]["patient_first_name"];
echo $list2["body"]["patient_last_name"];

//$pesel2 = $list2["body"]["patient_pesel"];

