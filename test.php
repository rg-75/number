<?php
$n = "";
$txt = file_get_contents("id_unique_ads.txt");
$id = explode("
",$txt);
// print_r($id);
foreach($id as $a ){
	// $a = "20175784";
	$b = str_replace("
","",$a);
	// echo $b;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.ouedkniss.com/xxx-d'.$b);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_NOBODY, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Linux; Android 4.4.2; Nexus 4 Build/KOT49H) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.114 Mobile Safari/537.36");
$page = curl_exec($ch);
$ex = explode("'",$page);
foreach($ex as $v){
	$ex2 = explode("tel:",$v);
	if(isset($ex2[1]) 
		and filter_var(str_replace("0","",$ex2[1]), FILTER_VALIDATE_INT) 
		and (strlen($ex2[1]) === 10 or  strlen($ex2[1]) === 13)
	){
		$n .= $ex2[1]."\n";
		echo $b."=> ".$ex2[1]."\n";
	}
}
}
$myfile = fopen("n.txt", "w") or die("Unable to open file!");
fwrite($myfile,$n);
?>
