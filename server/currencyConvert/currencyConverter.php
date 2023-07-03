<?php
include "../connect.php";
$from = $_GET["from"];
// $to = $_GET["to"];
$amount = 1;
$toEGP;

switch ($from) {
    case 'EGP':
        $toEGP = 1;
        break;
    case 'USD':
        $toEGP = 29.50;
        break;
    case 'JPY':
        $toEGP = 0.19;
        break;
    case 'THB':
        $toEGP = 0.72;
        break;
    case 'GBP':
        $toEGP = 29.67;
        break;
    case 'AED':
        $toEGP = 6.74;
        break;
    case 'AUD':
        $toEGP = 16.65;
        break;
    case 'CAD':
        $toEGP = 18.09;
        break;
    case 'JOD':
        $toEGP = 34.85;
        break;
    case 'BHD':
        $toEGP = 65.62;
        break;
    case 'KWD':
        $toEGP = 80.78;
        break;
    case 'RUB':
        $toEGP = 0.34;
        break;
    case 'SAR':
        $toEGP = 6.58;
        break;
    case 'OMR':
        $toEGP = 64.27;
        break;
    case 'QAR':
        $toEGP = 6.80;
        break;
    case 'CHF':
        $toEGP = 26.45;
        break;
    case 'DKK':
        $toEGP = 3.52;
        break;
    case 'SEK':
        $toEGP = 2.34 ;
        break;
    case 'NOK':
        $toEGP = 2.48;
        break;
    case 'CNY':
        $toEGP = 3.59;
        break;
    case 'EUR':
        $toEGP = 26.15;
        break;
    default:
        # code...
        break;
}
$result = $amount * $toEGP;

echo json_encode($result, JSON_PRETTY_PRINT);
	
// $string = $from . "_" . $to;
// $curl = curl_init();
// curl_setopt_array($curl, array(
// CURLOPT_URL => "https://free.currconv.com/api/v7/convert?q=" . $string . "&compact=ultra&apiKey={your_api_key}",
// CURLOPT_RETURNTRANSFER => 1
// ));

// $response = curl_exec($curl);
// $response = json_decode($response, true);
// $rate = $response[$string];
// $total = $rate * $amount;
// print_r($response);

?>