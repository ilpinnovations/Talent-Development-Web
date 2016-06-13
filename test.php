<?php require_once('Connections/talent_uk.php'); ?>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//sleep(100000);
$file = fopen("docs/empdb.csv","r");
mysql_select_db($database_talent_uk, $talent_uk);
	//$handle = fopen($file, "r");
	$c = 0;
	$count = 0;
	fgetcsv($file);
	while(($filesop = fgetcsv($file, 1000, ",")) !== false)
	{
		
		$emp_id	=mysql_real_escape_string($filesop[0]);
		$emp_name =mysql_real_escape_string($filesop[1]);
		$doj=mysql_real_escape_string($filesop[2]);	
		$grade	=mysql_real_escape_string($filesop[3]);
		$role_intcs	=mysql_real_escape_string($filesop[4]);
		$parent_iou_name=mysql_real_escape_string($filesop[5]);	
		$person_type	=mysql_real_escape_string($filesop[6]);
		$person_type_updated=mysql_real_escape_string($filesop[7]);	
		$depute_branch	=mysql_real_escape_string($filesop[8]);
		$employee_depute_dc=mysql_real_escape_string($filesop[9]);
		$location	=mysql_real_escape_string($filesop[10]);
		$base_branch	=mysql_real_escape_string($filesop[11]);
		$client_country	=mysql_real_escape_string($filesop[12]);
		$customer	=mysql_real_escape_string($filesop[13]);
		$large_customer	=mysql_real_escape_string($filesop[14]);
		$won_or_swon	=mysql_real_escape_string($filesop[15]);
		$swon_remarks	=mysql_real_escape_string($filesop[16]);
		$swon_category	=mysql_real_escape_string($filesop[17]);
		$project_id	=mysql_real_escape_string($filesop[18]);
		$project_name	=mysql_real_escape_string($filesop[19]);
		$project_location_with_respect_to_India	=mysql_real_escape_string($filesop[20]);
		$project_type	=mysql_real_escape_string($filesop[21]);
		$short_iou	=mysql_real_escape_string($filesop[22]);
		$short_ou	=mysql_real_escape_string($filesop[23]);
		$new_iou	=mysql_real_escape_string($filesop[24]);
		$new_ou	=mysql_real_escape_string($filesop[25]);
		$iou	=mysql_real_escape_string($filesop[26]);
		$project_iou	=mysql_real_escape_string($filesop[27]);
		$project_ou	=mysql_real_escape_string($filesop[28]);
		$sector	=mysql_real_escape_string($filesop[29]);
		$country	=mysql_real_escape_string($filesop[30]);
		$old_base_country	=mysql_real_escape_string($filesop[31]);
		$delivery_centre	=mysql_real_escape_string($filesop[32]);
		$employee_department	=mysql_real_escape_string($filesop[33]);
		$designation	=mysql_real_escape_string($filesop[34]);
		$trainee_or_nontrainee	=mysql_real_escape_string($filesop[35]);
		$mapp_designation	=mysql_real_escape_string($filesop[36]);
		$senior_or_junior	=mysql_real_escape_string($filesop[37]);
		$cc_or_noncc	=mysql_real_escape_string($filesop[38]);
		$sob_name	=mysql_real_escape_string($filesop[39]);
		$base_country_code	=mysql_real_escape_string($filesop[40]);
		$allocation_start_date	=mysql_real_escape_string($filesop[41]);
		$allocation_end_date	=mysql_real_escape_string($filesop[42]);
		$percentage_allocation	=mysql_real_escape_string($filesop[43]);
		$gender	=mysql_real_escape_string($filesop[44]);
		$visa_type	=mysql_real_escape_string($filesop[45]);
		$visa_status	=mysql_real_escape_string($filesop[46]);
		$visa_status_start_date	=mysql_real_escape_string($filesop[47]);
		$visa_status_end_date	=mysql_real_escape_string($filesop[48]);
		$relevant_previous_experience=mysql_real_escape_string($filesop[49]);	
		$tcs_experience	=mysql_real_escape_string($filesop[50]);
		$total_experience	=mysql_real_escape_string($filesop[51]);
		$ba_company_name	=mysql_real_escape_string($filesop[52]);
		$nationality	=mysql_real_escape_string($filesop[53]);
		$assignment_status	=mysql_real_escape_string($filesop[54]);
		$brm	=mysql_real_escape_string($filesop[55]);
		$brm_employee_number	=mysql_real_escape_string($filesop[56]);
		$owner_employee_number	=mysql_real_escape_string($filesop[57]);
		$project_owner	=mysql_real_escape_string($filesop[58]);
		$project_supervisor_number	=mysql_real_escape_string($filesop[59]);
		$project_supervisor_name	=mysql_real_escape_string($filesop[60]);
		$employee_travel_country	=mysql_real_escape_string($filesop[61]);
		$travel_type	=mysql_real_escape_string($filesop[62]);
		$sp	=mysql_real_escape_string($filesop[63]);
		$sub_sp=mysql_real_escape_string($filesop[64]);
		$sub_iou	=mysql_real_escape_string($filesop[65]);
		$work_sector	=mysql_real_escape_string($filesop[66]);
		$work_country	=mysql_real_escape_string($filesop[67]);
		$work_state	=mysql_real_escape_string($filesop[68]);
		$work_city	=mysql_real_escape_string($filesop[69]);
		$client_geography	=mysql_real_escape_string($filesop[70]);
		$remarks=mysql_real_escape_string($filesop[71]);
		
		$sql1 = "SELECT emp_id FROM `users` WHERE emp_id='$emp_id'";
$result=mysql_query($sql1,$talent_uk);
$rows = mysql_num_rows($result);
if($rows==1)
{

}
else
{
$sql = mysql_query("INSERT INTO `users` (`emp_id`, `emp_name`,`doj`, `grade`, `role_intcs`, `parent_iou_name`, `person_type`, `person_type_updated`, `depute_branch`, `employee_depute_dc`, `location`, `base_branch`, `client_country`, `customer`, `large_customer`, `won_or_swon`, `swon_remarks`, `swon_category`, `project_id`, `project_name`, `project_location_with_respect_to_india`, `project_type`, `short_iou`, `short_ou`, `new_iou`, `new_ou`, `iou`, `project_iou`, `project_ou`, `sector`, `country`, `old_base_country`, `delivery_centre`, `employee_department`, `designation`, `trainee_or_nontrainee`, `mapp_designation`, `senior_or_junior`, `cc_or_noncc`, `sob_name`, `base_country_code`, `allocation_start_date`, `allocation_end_date`, `percentage_allocation`, `gender`, `visa_type`, `visa_status`, `visa_status_start_date`, `visa_status_end_date`, `relevant_previous_experiance`, `tcs_experiance`, `total_experiance`, `ba_company_name`, `nationality`, `assignment_status`, `brm`, `brm_employee_number`, `owner_employee_number`, `project_owner`, `project_supervisor_number`, `project_supervisor_name`, `employee_travel_country`, `travel_type`, `sp`, `sub_sp`, `sub_iou`, `work_sector`, `work_country`, `work_state`, `work_city`, `client_geography`, `remarks`) VALUES ('$emp_id','$emp_name','$doj', '$grade', '$role_intcs', '$parent_iou_name', '$person_type', '$person_type_updated', '$depute_branch', '$employee_depute_dc', '$location', '$base_branch', '$client_country', '$customer', '$large_customer', '$won_or_swon', '$swon_remarks', '$swon_category', '$project_id', '$project_name', '$project_location_with_respect_to_India', '$project_type', '$short_iou', '$short_ou', '$new_iou', '$new_ou', '$iou', '$project_iou', '$project_ou', '$sector', '$country', '$old_base_country', '$delivery_centre', '$employee_department', '$designation', '$trainee_or_nontrainee', '$mapp_designation', '$senior_or_junior', '$cc_or_noncc', '$sob_name', '$base_country_code', '$allocation_start_date', '$allocation_end_date', '$percentage_allocation', '$gender', '$visa_type', '$visa_status', '$visa_status_start_date', '$visa_status_end_date', '$relevant_previous_experience', '$tcs_experience', '$total_experience', '$ba_company_name', '$nationality', '$assignment_status', '$brm', '$brm_employee_number', '$owner_employee_number', '$project_owner', '$project_supervisor_number', '$project_supervisor_name', '$employee_travel_country', '$travel_type', '$sp', '$sub_sp', '$sub_iou', '$work_sector', '$work_country', '$work_state', '$work_city', '$client_geography', '$remarks');", $talent_uk) or trigger_error(mysql_error(),E_USER_ERROR);
		$count++;
		
}
	}
	
echo "Successfull. uploaded ".$count." employes";		
fclose($file);
?>