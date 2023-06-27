<?php 
require_once 'function.php';
$date =   time();
$outFORM_ID = isset($_POST['FORM_ID']) ? $_POST['FORM_ID'] : null;
$outSeminarId = isset($_POST['SeminarId']) ? $_POST['SeminarId'] : null;
$outOKPO  = isset($_POST['erdpou']) ? $_POST['erdpou'] : null;
$outEmail = isset($_POST['email']) ? $_POST['email'] : null;
$outFirstName = isset($_POST['first_name']) ? $_POST['first_name'] : null;
$outTelephone = isset($_POST['number_phone']) ? $_POST['number_phone'] : null;
$outCompanyName =isset($_POST['name_company']) ? $_POST['name_company'] : null;
$outPriceIDfor1c = isset($_POST['price']) ? $_POST['price'] : null;

$messages_1cDB=[
				'formNumber'=> $outFORM_ID,
				'ID'=> $outSeminarId,
				'dataMessage'=> $date,
				'firstName'=> $outFirstName,
				'Telephone'=> $outTelephone ,
				'CompanyName'=> $outCompanyName,
				'OKPO'=> $outOKPO,
				'PriceID'=> $outPriceIDfor1c,
				'Email'=> $outEmail,
				'SeminarNumber'=> $outSeminarId,
				'SeminarDate'=> "",
				'Commentary'=> "",
				'utm_source'=> "",
				'utm_medium'=> "",
				'utm_campaign'=> "",
			];

$messagesTg= 'Семінар №' . $outSeminarId ."\n" .'Організація: '. $outCompanyName."\n" . 'Імя: ' . $outFirstName."\n" . 'Телефон: ' . $outTelephone ;

$ansFromDb = send1cDb($messages_1cDB);
$lenght = strlen($ansFromDb);

if ($lenght == 83) {
	echo "Заявка на рахунок для підприємства <b>«$outCompanyName</b> ЄДРПОУ - <b> $outOKPO</b> успішно заповнена.<br><br> На вказану Вами електронну адресу <b>«$outEmail</b> найближчим часом буде надіслано повідомлення.";
	sendToTgEmpl($messagesTg);
		}


 ?>