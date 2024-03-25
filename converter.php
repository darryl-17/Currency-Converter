<!DOCTYPE html>
<html>
<head>

    <title>Currency Converter</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
        }

        .container {
            width: 400px;
            padding: 20px;
            background-color: #d3d3d3;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"], select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .message {
            margin-top: 15px;
            text-align: center;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2><i><u>CURRENCY CONVERTER </u></i></h2>
        <form method="post" action = "">
            <div class="form-group">
                <label for="amount"><b>Amount:</b></label>
                <input type="text" id="amount" name="amount" required placeholder="Enter an amount">
            </div>
            <div class="form-group">
                <label for="actual"><b>Actual:</b></label>
                <select id="actual" name="actual" required>
                    <option value="">Choose a currency</option>
                    <option value="USD">USD</option>
                    <option value="EUR">EUR</option>
                    <option value="XOF">XOF</option>
                    <option value="XAF">XAF</option>
                    <option value="POUNDS">POUNDS</option>
                </select>
            </div>
            <div class="form-group">
                <label for="target"><b>Target:</b></label>
                <select id="target" name="target" required>
                    <option value="">Choose a currency</option>
                    <option value="USD">USD</option>
                    <option value="EUR">EUR</option>
                    <option value="XOF">XOF</option>
                    <option value="XAF">XAF</option>
                    <option value="POUNDS">POUNDS</option>
                </select>
            </div>
            <button type="submit" value="Convert"> CONVERT</button>

 
        </form>


        <?php

$amount = 0;
$actual = 0;
$target= 0;


if(isset($_POST['amount'])){
    $amount = $_POST['amount'];

}
if(isset($_POST['actual'])){
    $actual = $_POST['actual'];
    
}
if(isset($_POST['target'])){
    $target = $_POST['target'];
    
}


$service_url = "http://localhost/ism_api/currencyconverterWS.php";
$curl = curl_init($service_url);
$curl_post_data = array(
    'amount'=>$amount,
    'actual'=>$actual,
    'target'=>$target,
   
);

curl_setopt($curl,CURLOPT_POST,true);
curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
curl_setopt($curl,CURLOPT_POSTFIELDS,$curl_post_data);
$curl_response = curl_exec($curl);

if ($curl_response === false){
    curl_close($curl);
    echo "Something went wrong during curl_exec";
}

curl_close($curl);
$response_decoded = json_decode($curl_response) ;


echo 'amount :'.$response_decoded->amount.'<br>'; 
echo 'actual :'.$response_decoded->actual.'<br>';
echo 'target :'.$response_decoded->target.'<br>';
echo 'converted_amount:'.$response_decoded->converted_amount.'<br>';




?>

</body>
</html>