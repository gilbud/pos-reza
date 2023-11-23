<?php 
function kode_random($lenght){
	$data = "1234567890ABCDEFGHI";
	$string = 'PJ-';
	$now = DateTime::createFromFormat('U.u', microtime(true));
	$date=$now->format("mdYHisu");
	for ($i=0; $i < $lenght ; $i++) { 
		$pos = rand(0, strlen($data)-1);
		$string .=$data[$pos];
	}
	$string.=$date;
	return $string;

}

$kode= kode_random(4);
//echo  $kode;

?>