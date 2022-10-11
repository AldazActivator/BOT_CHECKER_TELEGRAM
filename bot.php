<?php

//all rights reserved iAldazActivator (GERSON ALDAZ)
//bot telegram
//note => to make the bot pull, you must put this link => https://api.telegram.org/bot$youtoken/setWebhook?url=https://you_domain.com/check/bot/ialdaz_bot_check.php
//example -> https://api.telegram.org/bot50715830ionakla05:AAHB3_osi3cuw1mgOB8dy8nqa66XNubGosa/setWebhook?url=https://iservices-dev.us/check/bot/ialdaz_bot_check.php

$api = "bot50715830ionakla05:AAHB3_osi3cuw1mgOB8dy8nqa66XNubGosa"; // <TOKEN>  bot
$input = file_get_contents("php://input");
$update = json_decode($input, true);
date_default_timezone_set('Asia/Ho_Chi_Minh');


$firstName = $update["message"]["from"]["first_name"]?$update["message"]["from"]["first_name"]:"user";
$lastName = $update["message"]["from"]["last_name"]?$update["message"]["from"]["last_name"]:"";
$fullName = $firstName." ".$lastName;

$Mensagem = $update['message']['text'];
$chatid = $update['message']['chat']['id'];

function sendMessage($chatid, $text)
{
global $api;
$url = "https://api.telegram.org/$api/sendMessage?chat_id=".$chatid."&parse_mode=HTML&text=".urlencode($text);
$get = file_get_contents($url);

}


$DetectaComando = substr($Mensagem, 0 ,1); //Retorna o Barra (/)
if($chatid == '-1001612501809'){

if ($DetectaComando == '/'){

if ( strpos( $Mensagem, 'start' ) == true ){
  sendMessage($chatid, "Hi $fullName
Bot Checker Device");	
}


// Checkeo SN/IMEI Api key

else if ( strpos( $Mensagem, 'check') == true )
{   
	 $imei1 = explode(' ', $Mensagem);
	 $imei = $imei1[1];
	 $firstName = $update["message"]["from"]["first_name"]?$update["message"]["from"]["first_name"]:"user";
	 $lastName = $update["message"]["from"]["last_name"]?$update["message"]["from"]["last_name"]:"";
	 $fullName = $firstName." ".$lastName;

		 if (empty($imei)) 
		{   
			sendMessage($chatid, "Example: /check FH7QK1MKG9J6");  
		}
		else 
		{
			sendMessage($chatid, "Processing ...");
			$ch = curl_init();
			//KEY FOR SECURITY!
			$KEY = "G3RS0N-ALDAZ-IABC-KLO-IALDAZ-ACTIVATOR-CLABE-BCBV-FUCK-SCAMMERS-XD";
			//URL!
			$url = "https://iservices-dev.us/2022/checker/check.php?KEY=".$KEY."&sn=".$imei;
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$result = curl_exec($ch);
			$result = strip_tags($result);
			curl_close($ch);
			if ($result == "Error KEY Not Work, Contact with The ADMIN!" || $result == "Error: Model Not Found ❌" || $result == "404")
			{
				sendMessage($chatid, "Error getting data from provided URL, contact administrator and try again...!");
			}
			else
			{
				sendMessage($chatid, $result);
				sendMessage($chatid, "Thanks U! :)");
			}
			
		}
}
	  
}




}

else if ( strpos( $Mensagem, 'hola' ) == true ){                           
	sendMessage($chatid, "hi ");
}

}
else {


sendMessage($chatid, "Hello $fullName
you dont have Access, sorry!!!\nyour chat id is $chatid");	

}
