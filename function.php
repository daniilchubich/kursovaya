<?php 	
function send1cDb($mess_1cDb){
	$data_string= json_encode($mess_1cDb, JSON_UNESCAPED_UNICODE);

	$curl = curl_init('https://exchange.kraft.net.ua:44315/kraft_utp/hs/sitemsg/simple_form5');
	curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
	curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
	// Принимаем в виде массива. (false - в виде объекта)
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_HTTPHEADER, array(
		'Content-Type: application/json',
		'Content-Length: ' . strlen($data_string)
		)
	);
		$data = curl_exec($curl);
		return $data;
}
function sendToTgEmpl($mess_Tg){
		$token = "2007656614:AAFNUSABqG5s4qhATg0t-k_eUaDq96CNcfI";

$getQuery = array(
    "chat_id" 	=> 685080895,
    "text"  	=> $mess_Tg,
    "parse_mode" => "html"
);
$ch = curl_init("https://api.telegram.org/bot". $token ."/sendMessage?" . http_build_query($getQuery));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_HEADER, false);

$resultQuery = curl_exec($ch);
curl_close($ch);

}
 ?>
