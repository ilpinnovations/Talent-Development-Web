<?php require_once('Connections/talent_uk.php'); ?>
<?php
$gcm_id="APA91bHGrhFLC1dPM19fB6CFwq2-xZ7PTIPeMrjCKHZ1jcibO5";
	
		$pushMessage = "Hello";
		$gcmRegID = array();
		array_push($gcmRegID , $gcm_id);
		
		if (isset($pushMessage)) {		
			$message = array("m" => $pushMessage);	
			$pushStatus = sendMessageThroughGCM($gcmRegID, $message);
		}		

	
	//Generic php function to send GCM push notification
function sendMessageThroughGCM($registatoin_ids, $message) {
		//Google cloud messaging GCM-API url
        $url = 'https://android.googleapis.com/gcm/send';
        $fields = array(
            "registration_ids" => $registatoin_ids,
            "data" => $message
        );
		$jsonarray = json_encode($fields);
		echo $jsonarray;
		// Update your Google Cloud Messaging API Key
		define("GOOGLE_API_KEY", "AIzaSyBQTBTQQuUG3vWfFVVR2KzpAvvlQ4dP_JA"); 		
        $headers = array(
            'Authorization: key=' . GOOGLE_API_KEY,
            'Content-Type: application/json'
        );
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);	
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonarray);
        $result = curl_exec($ch);				
        
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }
        curl_close($ch);
        echo $result;
}
?>
