
<?php
$string='{"person":[
			{
				"name":{"first":"John","last":"Adams"},
                "age":"40"
			},
			{
				"name":{"first":"Thomas","last":"Jefferson"},
                "age":"35"
			}
		 ]}';
$json_array = '{"data":[{"com1_f1":"","com1_f2":"","com2_f1":"","com3_f1":"","com4_f1":"","com5_f1":"","date":"2016-01-31","employeeId":"1037186","f1_rat1":"3","f1_rat10":"4","f1_rat2":"5","f1_rat3":"3","f1_rat4":"5","f1_rat5":"3","f1_rat6":"5","f1_rat7":"3","f1_rat8":"5","f1_rat9":"3","f2_rat1":"3.0","f2_rat10":"2.0","f2_rat2":"3.0","f2_rat3":"3.0","f2_rat4":"4.0","f2_rat5":"3.0","f2_rat6":"2.0","f2_rat7":"4.0","f2_rat8":"3.0","f2_rat9":"4.0","feedbackId":"1","registrationId":"180","sessionId":"60"}]}';
//$url="http://api.androidhive.info/volley/person_array.json";
//$json = file_get_contents($url);
$json_data = json_decode($json_array);
foreach($json_data->data as $p)
{
echo $p->date;
}


?>