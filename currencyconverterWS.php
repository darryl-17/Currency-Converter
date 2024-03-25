<?php
header('Content-type: application/json');

$amount = 0;
$actual = '';
$target = '';
$results ='';

if (isset($_POST['amount'])) {
    $amount = floatval($_POST['amount']);
}
if (isset($_POST['actual'])) {
    $actual = $_POST['actual'];
}
if (isset($_POST['target'])) {
    $target = $_POST['target'];
}

if (isset($_POST['target'])) {
    $target = $_POST['target'];
}


$conversionRates = [
    "USD" => 1.23,
    "EUR" => 0.9237,
    "XOF" => 655.957,
    "XAF" => 655.957,
    "POUNDS" => 132.14,
];

if (isset($conversionRates[$actual]) ) {
    $convertedAmount = $amount * $conversionRates[$target];
    $result = number_format($convertedAmount, 2);

    $response = [
        'http_method' => 'POST',
        'amount' => $amount,
        'actual' => $actual,
        'target' => $target,
        'converted_amount' => $result,
        'message' => 'Currency converted successfully',
        'http_status_code' => '200'
    ];
} else {
    $response = [
        'http_method' => 'POST',
        'amount' => $amount,
        'actual' => $actual,
        'target' => $target,
        'converted_amount' => null,
        'message' => 'Invalid currency selected',
        'http_status_code' => '400'
    ];
}


echo json_encode($response);
?>