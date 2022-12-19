<?php

$pesel = 90022803093;
function dane($pesel) {
    //include 'jwtgen.php';
    include 'ewus-check.php';

    $resp = ewus_check($pesel);
    //$list = json_decode($resp, true);

    //echo $list["body"]["patient_pesel"];
return ($resp);
}

$resp2 = dane($pesel);
$list2 = json_decode($resp2, true);

echo $list2["body"]["patient_pesel"];