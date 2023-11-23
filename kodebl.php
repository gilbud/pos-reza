<?php 
function kode_randombeli($lenght){
	$data = "1234567890ABCDEFGHI";
	$string = 'TP-';
	$now = DateTime::createFromFormat('U.u', microtime(true));
	$date=$now->format("mdYHisu");
	for ($i=0; $i < $lenght ; $i++) { 
		$pos = rand(0, strlen($data)-1);
		$string .=$data[$pos];
	}
	$string.=$date;
	session_start();
	unset($_SESSION['pembelian']);
	return $string;

}

$kodebl= kode_randombeli(4);
//echo  $kode;

?>