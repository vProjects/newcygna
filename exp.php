<?php

	include 'v-includes/class.DAL.php';

	$obj = new ManageContent_DAL();

	//$ans = $obj->updateValueMultipleCondition("chat_info","message","dipanjan",array("id"),array(1));
	
	//$hghg = $obj->getRowValueMultipleCondition("chat_info",array("chat_id"),array("CHAT5305dc3c0b021"));
	
	/*$abc = $obj->getValue_likely_descendingTwoLimit("project_info","*","category","Category2","sub_category","Sub Category 3",50);
	echo '<pre>';
	print_r($abc);
	echo '</pre>';*/
	
	if (time() < strtotime("0000-00-00"))
	{
		echo time();
		echo strtotime("2014-06-04");
	}
	
?>
