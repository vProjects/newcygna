<?php

	include 'v-includes/class.DAL.php';

	$obj = new ManageContent_DAL();

	//$ans = $obj->updateValueMultipleCondition("chat_info","message","dipanjan",array("id"),array(1));
	
	//$hghg = $obj->getRowValueMultipleCondition("chat_info",array("chat_id"),array("CHAT5305dc3c0b021"));
	
	/*if($_POST['fn'] == md5('login'))
	{
		echo 'jjj';
	}*/
	$skill = (explode(',','Skill1,Skill2,Skill3,Skill5,Skill6,Skill7,Skill8,Skill10,Skill55'));
	
	echo end(array_keys($skill));
	foreach($skill as $skills)
	{
		
		/*if($i == count($skill))
		{
			echo count($skill);
		}*/
	}
?>
