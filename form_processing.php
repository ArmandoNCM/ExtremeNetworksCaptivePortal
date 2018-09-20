<?php
require_once(dirname(__FILE__).'/class/Log.php');
require_once(dirname(__FILE__).'/class/Utils.php');
require_once(dirname(__FILE__).'/class/Signature.php');

$token = $_POST['token'];
$username = $_POST['username'];
$amazon_signature = $_POST['amazon_signature'];
$amazon_credential = $_POST['amazon_credential'];
$amazon_date = $_POST['amazon_date'];
$url = $_POST['url'];

$computed_signature = Signature::signUrl($url, $amazon_credential, $amazon_date);

Log::print("Computed Signature: $computed_signature", "message", __FILE__, __LINE__);


$comparisonString = $amazon_signature == $computed_signature ? 'TRUE' : 'FALSE';

Log::print("Signatures Match: $comparisonString", "message", __FILE__, __LINE__);


?>

<html>
<head>
    <meta charset="utf-8" />
    <title><?php echo "Success" ?></title>
</head>
<body>
    
    <h1><?php echo "We're pleased to serve you!" ?></h1>

</body>
</html>