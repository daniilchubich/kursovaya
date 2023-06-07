<?php 
			$date =   time();
			$outFORM_ID =   5;
			$outOKPO  = isset($_POST['erdpou']) ? $_POST['erdpou'] : null;
			$outEmail = isset($_POST['email']) ? $_POST['email'] : null;
			$outFirstName = isset($_POST['first_name']) ? $_POST['first_name'] : null;
			$outTelephone = isset($_POST['number_phone']) ? $_POST['number_phone'] : null;
			$outCompanyName =isset($_POST['name_company']) ? $_POST['name_company'] : null;
			$outPriceIDfor1c = isset($_POST['price']) ? $_POST['price'] : null;

$messages=[
				'formNumber'=> 5,
				'ID'=> 15597,
				'dataMessage'=> $date,
				'firstName'=> $outFirstName,
				'Telephone'=> $outTelephone ,
				'CompanyName'=> $outCompanyName,
				'OKPO'=> 2483000031,
				'PriceID'=> $outPriceIDfor1c,
				'Email'=> $outEmail,
				'SeminarNumber'=> "",
				'SeminarDate'=> "",
				'Commentary'=> "",
				'utm_source'=> "",
				'utm_medium'=> "",
				'utm_campaign'=> "",
			];
			$data_string= json_encode($messages, JSON_UNESCAPED_UNICODE);

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
			if (curl_errno($curl)) {
				//print "Error: " . curl_error($curl);
				//AddMessage2Log("Error:". curl_error($curl)." !!!  Заявка на участие в семинаре ОКПО-".$outOKPO.", e-mail-".$outEmail.", ИмяОтчество-".$outFirstName.", Телефон-".$outTelephone."", "init.php | my_onAfterResultAddUpdate");
				//echo curl_exec($curl);
			} else {
				// Show me the result
				//AddMessage2Log("Заявка на участие в семинаре. Запрос:".$data_string." Ответ:".$data."", "init.php | my_onAfterResultAddUpdate");
				curl_close($curl);
			}
                var_dump($data);
		//CFormResult::SetField($RESULT_ID, '1C', $data);
		//заявка принята
	

 ?>