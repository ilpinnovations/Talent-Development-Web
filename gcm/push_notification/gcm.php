<?php
	//Generic php function to send GCM push notification
   function sendMessageThroughGCM($registatoin_ids, $message) {
		//Google cloud messaging GCM-API url
        $url = 'https://android.googleapis.com/gcm/send';
        $fields = array(
            'registration_ids' => $registatoin_ids,
            'data' => $message,
        );
		// Update your Google Cloud Messaging API Key
		define("GOOGLE_API_KEY", "AIzaSyByaqWPkBxVRmkVs8sgLZLN4eGPAwGL8O4"); 		
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
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        $result = curl_exec($ch);				
        
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }
        curl_close($ch);
        return $result;
    }
?>
<?php
	//Post message to GCM when submitted
	$pushStatus = "GCM Status Message will appear here";	
	if(!empty($_GET["push"])) {		
		$pushMessage = $_POST["message"];
		
		include_once './db_functions.php';
		$empid = $_POST["empid"];
    		$db = new DB_Functions();
		$gcmReg = $db->getGCMRegID($empid);
		$row = mysql_fetch_assoc($gcmReg);
		$gcmRegID = array();
		array_push($gcmRegID , $row['gcm_id']);
		
		if (isset($pushMessage)) {		
			$message = array("m" => $pushMessage);	
			$pushStatus = sendMessageThroughGCM($gcmRegID, $message);
		}		
	}
	
	//Get Reg ID sent from Android App and store it in text file
	if(!empty($_GET["shareRegId"])) {
		$gcmRegID  = $_POST["regId"]; 
		include_once './db_functions.php';
		
		$db = new DB_Functions(); 
		$vehicleNumber= $_POST["vehicleNumber"];
		$regId = $_POST["regId"];
		$res = $db->insertUser($vehicleNumber, $regId);
		exit;
	}	
?>


<html>
    <head>
        <title>Google Cloud Messaging (GCM) in PHP</title>
		<style>
			div#formdiv, p#status{
				text-align: center;
				background-color: #FFFFCC;
				border: 2px solid #FFCC00;
				padding: 10px;
			}
			textarea{
				border: 2px solid #FFCC00;
				margin-bottom: 10px;			
				text-align: center;
				padding: 10px;
				font-size: 25px;
				font-weight: bold;
			}
			input{
				background-color: #FFCC00;
				border: 5px solid #fff;
				padding: 10px;
				cursor: pointer;
				color: #fff;
				font-weight: bold;
			}
			 
		</style>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script>
		$(function(){
			$("textarea").val("");
		});
		function checkTextAreaLen(){
			var msgLength = $.trim($("textarea").val()).length;
			if(msgLength == 0){
				alert("Please enter message before hitting submit button");
				return false;
			}else{
				return true;
			}
		}
		</script>
    </head>
	<body>
		<div id="formdiv">
		<h1>Google Cloud Messaging (GCM) in PHP</h1>	
		<form method="post" action="/gcm/push_notification/gcm.php/?push=true" onSubmit="return checkTextAreaLen()">					                                                      
		<textarea rows="5" name="message" cols="45" placeholder="Message to send via GCM"></textarea><br/>
		<input type="submit"  value="Send Push Notification through GCM" />
		</form>
		</div>
		<p id="status"><?php echo $pushStatus; ?></p>        
    </body>
</html>