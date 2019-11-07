<?php

function insert_response($jsonMpesaResponse){

	try{
	$conn = new PDO("mysql:dbhost=localhost;dbname=kawira","root","");
	echo "Connction Successful";
}
catch(PDOException $e)
{
	die("Error Connecting".$e->getMessage());
}
try
{

$insert = $conn->prepare("INSERT INTO `mobile_payments`(`TransactionType`, `TransID`, `TransTime`, `TransAmount`, `BusinessShortCode`, `BillRefNumber`, `InvoiceNumber`, `OrgAccountBalance`, `ThirdPartyTransID`, `MSISDN`, `FirstName`, `MiddleName`, `LastName`) VALUES(TransactionType, TransID, TransTime, TransAmount, BusinessShortCode, BillRefNumber, InvoiceNumber, OrgAccountBalance, ThirdPartyTransID, MSISDN, FirstName, MiddleName, LastName)");
$insert->execute((array)($jsonMpesaResponse));
}
catch($PDOException $e)
{
	$errLog = fopen('error.txt', 'a');
	fwrite($errLog, $e->getMessage());
	fclose($errLog);

	$logFailedTransaction = fopen('failedTransaction.txt', 'a');
	$fwrite($logFailedTransaction,json_encode($jsonMpesaResponse));
	fclose($logFailedTransaction);
}
}

?>