<?php

	include 'v-includes/class.DAL.php';

	$obj = new ManageContent_DAL();

	//$ans = $obj->updateValueMultipleCondition("chat_info","message","dipanjan",array("id"),array(1));
	
	//$hghg = $obj->getRowValueMultipleCondition("chat_info",array("chat_id"),array("CHAT5305dc3c0b021"));
	
	/*if($_POST['fn'] == md5('login'))
	{
		echo 'jjj';
	}*/
	
	echo md5(123456);

?>