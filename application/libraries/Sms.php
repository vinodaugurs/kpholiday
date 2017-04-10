<?php 

class Sms {
	

		
	public function sendSms($mobile,$msg){
	
// http://sms.karosms.co.in/submitsms.jsp?user=HARIOM2&key=603acc6cfdXX&mobile=+918090808989&message=testsms&senderid=EYATRA&accusage=1

$xml_data ='<?xml version="1.0"?>
<parent>
<child>
<user>HARIOM2</user>
<key>603acc6cfdXX</key>
<mobile>'.$mobile.'</mobile>
<message>'.$msg.'</message>
<accusage>1</accusage>
<senderid>EYATRA</senderid>
</child>
<child>
<user>HARIOM2</user>
<key>603acc6cfdXX</key>
<mobile>'.$mobile.'</mobile>
<message>'.$msg.'</message>
<accusage>1</accusage>
<senderid>EYATRA</senderid>
</child>
</parent>';

$URL = "sms.karosms.co.in/submitsms.jsp?"; 

			$ch = curl_init($URL);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_ENCODING, 'UTF-8');
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/xml'));
			curl_setopt($ch, CURLOPT_POSTFIELDS, "$xml_data");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			$output = curl_exec($ch);
			curl_close($ch);

	return $output;
	}
	
}

?>
