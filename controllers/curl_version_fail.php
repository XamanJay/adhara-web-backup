/*//The url you wish to send the POST request to
$url = "http://adharanew:8080/banamex";

//The data you want to send via POST
$fields = [
    'Title' => $title,
    'virtualPaymentClientURL' => $virtualPaymentClientURL,
    'vpc_Version' => $vpc_Version,
    'vpc_Command' => "pay",
    'vpc_AccessCode' => $vpc_AccessCode,
    'vpc_MerchTxnRef' => $vpc_MerchTxnRef,
    'vpc_Merchant' => $vpc_Merchant,
    'vpc_OrderInfo' => $vpc_OrderInfo,
    'vpc_Amount' => $vpc_Amount,
    'vpc_ReturnURL' => $vpc_ReturnURL,
    'vpc_Locale' => $vpc_Locale,
    'vpc_Currency' => $vpc_Currency,
    'vpc_CustomPaymentPlanPlanId' => $vpc_CustomPaymentPlanPlanId,
];

//url-ify the data for the POST
$fields_string = http_build_query($fields);

//open connection
$ch = curl_init();

//set the url, number of POST vars, POST data
curl_setopt($ch, CURLOPT_ENCODING, 'UTF-8');
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch,CURLOPT_POST, true);
curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

//So that curl_exec returns the contents of the cURL; rather than echoing it
curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 

//execute post
$result = curl_exec($ch);
echo $result;*/