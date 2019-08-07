<?php

$token = "8B02AFD591FF7964612F78967FAABF5B6DF05ACACAAFC23A";
$description = "teste";
$amount = "100.01";
$payerName = urlencode("Fabio Paschoalino Rizzaro");
$payerCpfCnpj = "22317063857";




$json_url = "https://sandbox.boletobancario.com/boletofacil/integration/api/v1/issue-charge?"
        . "token=" . $token
        . "&description=" . $description
        . "&amount=" . $amount
        . "&payerName=" . $payerName
        . "&payerCpfCnpj=" . $payerCpfCnpj;


/*
  $json = file_get_contents($json_url);
  $datajson = json_decode($json, TRUE);

  echo $datajson['data']['charges']['0']['code'] . "<br>";
  echo $datajson['data']['charges']['0']['dueDate'] . "<br>";
  echo $datajson['data']['charges']['0']['checkoutUrl'] . "<br>";
  echo $datajson['data']['charges']['0']['link'] . "<br>";
  echo $datajson['data']['charges']['0']['payNumber'] . "<br>";
 */

$data = array(
    'token' => '8B02AFD591FF7964612F78967FAABF5B6DF05ACACAAFC23A',
    'description' => 'teste cURL%',
    'amount' => '100.01',
    'payerName' => "Fabio Paschoalino Rizzaro",
    'payerCpfCnpj' => "22317063857"
);

//  Initiate curl
$ch = curl_init();
// Disable SSL verification
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
// Will return the response, if false it print the response
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// Set the url
curl_setopt($ch, CURLOPT_URL, 'https://sandbox.boletobancario.com/boletofacil/integration/api/v1/issue-charge');

curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
// Execute
$result = curl_exec($ch);
// Closing
curl_close($ch);




// Will dump a beauty json :3
$datajson = json_decode($result, true);
echo $datajson['data']['charges']['0']['code'] . "<br>";
echo $datajson['data']['charges']['0']['dueDate'] . "<br>";
echo $datajson['data']['charges']['0']['checkoutUrl'] . "<br>";
echo $datajson['data']['charges']['0']['link'] . "<br>";
echo $datajson['data']['charges']['0']['payNumber'] . "<br>";






